@push('custom_css')
    <style>
        .propertyType input[type=radio] {
            width: 0;
        }

        .select2-container .select2-selection--single, .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 35px;
        }
    </style>
@endpush
@php
    $data['categories'] = \App\Models\PropertyType::query()->where('IS_ACTIVE', 1)->orderByDesc('ORDER_ID')->get();

    if (!isset($type)) {
        $type = 'all';
    }
    if (!isset($cat)) {
        $cat = 'all';
    }
    if (!isset($data['cities'])) {
        $data['cities'] = \App\Models\City::query()->pluck('CITY_NAME', 'id');
    }
    if (!isset($data['conditions'])) {
        $data['conditions'] = \App\Models\PropertyCondition::query()
        ->where('IS_ACTIVE', 1)
                ->orderByDesc('ORDER_ID')
                ->get();
    }
    if (!isset($data['categories'])) {
        $data['categories'] = \App\Models\PropertyType::where('IS_ACTIVE', 1)
            ->orderByDesc('ORDER_ID')
            ->get();
    }
    $data['fAreas'] = isset($data['areas']) ? $data['areas']->pluck('AREA_NAME', 'id') : \App\Models\Area::query()->where('F_CITY_NO', '=', 1)->pluck('AREA_NAME', 'id');
@endphp

<div id="filterModal" class="modal fade" role="dialog" aria-label="Filter Modal">
    <div class="bg-white">
        <div class="search-filter-sec d-block d-md-none">
            <form action="#" id="resetForm">
                <div class="filter-header">
                    <h4 class="d-flex justify-content-between">
                        <a href="#" id="filterDismiss">
                            <i class="fa fa-long-arrow-left"></i>
                        </a>FILTER
                        <input type="button" onclick="resetFunction();" value="Reset">
                    </h4>
                </div>
                <div class="search-filter">
                    <div class="row search-type">
                        <div class="col-sm-3">
                            <div class="user-want">
                                <h4>I want to</h4>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <input type="radio" name="want" value="sale"
                                   id="buy" {{ $type == 'sale' ? 'checked' : '' }}>
                            <label
                                for="buy">Buy</label>
                            <input type="radio" name="want" value="rent"
                                   id="rent" {{ $type == 'rent' ? 'checked' : '' }}> <label for="rent">Rent</label>
                            <input type="radio" name="want" value="roommate"
                                   id="roommate" {{ $type == 'roommate' ? 'checked' : '' }}> <label
                                for="roommate">Roommate</label>
                        </div>
                    </div>

                    <!-- city & location -->
                    <div class="form-group d-flex flex-column">
                        <label for="city"><i class="fa fa-map-marker mr-2"
                                             style="margin-left: -4px; font-size: 18px; "></i>Select City</label>
                        <select name="city" id="city" class="form-control select2">
                            <option value="0">Select City</option>
                            @foreach($data['cities'] as $key => $city)
                                <option
                                    value="{{ $city }}-{{ $key }}" {{ $city == request()->route('city') ? 'selected' : '' }}>{{ $city }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group d-flex flex-column">
                        <label for="city"><i class="fa fa-map-marker mr-2"
                                             style="margin-left: -4px; font-size: 18px; "></i>Select Area</label>
                        <select name="city" id="fareas" class="form-control select2">
                            <option value="0">Select Area</option>
                            @foreach($data['fAreas'] as $key => $city)
                                <option
                                    value="{{ $city }}-{{ $key }}" {{ $city == request()->route('area') ? 'selected' : '' }}>{{ $city }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- property types -->
                    <div class="property-select">
                        <h4 data-toggle="modal" data-target="#staticBackdrop">
                            <i class="fa fa-building"></i>Property Types <br/>
                            <i class="fa fa-angle-right float-right"></i>
                        </h4>
                        <div class="form-group">
                            <select name="p_type" id="p_type" class="form-control">
                                <option value="all">All</option>
                                @foreach($data['categories'] as $category)
                                    <option
                                        value="{{ $category->URL_SLUG }}" {{ $category->URL_SLUG == $cat ? 'selected' : '' }}>{{ $category->PROPERTY_TYPE }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- condition -->
                        <div class="property-select">
                            <h4>
                                <i class="fa fa-tags"></i>Condition <br/>
                                <i class="fa fa-angle-right float-right"></i>
                            </h4>

                            <div class="categories-condition d-flex">
                                @foreach($data['conditions'] as $condition)
                                    <label for="m{{ strtolower($condition->PROD_CONDITION) }}">
                                        <input type="checkbox" name="mcondition"
                                               {{ request()->query->has('condition') ? (in_array($condition->id, explode(',', request()->query('condition'))) ? 'checked' : '') : '' }}
                                               value="{{ $condition->id }}"
                                               id="m{{ strtolower($condition->PROD_CONDITION) }}">{{ $condition->PROD_CONDITION }}
                                        <span class="checkmark"></span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- range  -->
                        <div class="range">
                            <h4><i class="fa fa-tags"></i>Property Price</h4>
                            <div class="row">
                                <div class="col-5">
                                    <div class="range-form">
                                        <input type="number" name="m_mn_price" class="form-control" placeholder="Min">
                                    </div>
                                </div>
                                <div class="col-2 text-center">
                                    <div class="range-to">
                                        <span>To</span>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="range-form">
                                        <input type="number" name="m_mx_price" class="form-control" placeholder="Max">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- search box -->
                        <div class="filter-search">
                            <input type="text" name="filter_search" id="search"
                                   placeholder="Search by PID, CIty, Location, Name">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>


                        <div class="filter-footer text-center mb-3">
                            <button type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('custom_js')
    <script>
        $('.select2').select2();
        // modal control
        // $(document).on('click', '.modalcategory .nav-link', function () {
        //     $('.modalcategory').modal('hide');
        //     $('.modalsubcategory').modal('show');
        //     $('.backcategory').modal('show');
        // });
        // $(document).on('click', '.backcategory', function () {
        //     $('.modalsubcategory').modal('hide');
        //     $('.modalcategory').modal('show');
        // });

        $('#filterDismiss').click(function () {
            console.log('clicked')
            $('body').removeClass('modal-open');
            $('body').find('.modal-backdrop').hide();
            $('#filterModal').hide(100);
        });

        $(document).on('click', 'button.close', function () {
            $($(this).data('target')).modal('toggle');
        })

        // multiple select area
        $(document).ready(function () {
            let resetForm = $('#resetForm');
            let mobileSort = $('#mobile_sort');
            let mobileVerified = $('#mobile_verified');

            /*
            $('#city').change(function () {
                let cityId = $(this).val().split('-')[1];
                $('#fareas').empty();
                $.ajax({
                    url: '{{ route('api.get.area') }}?city=' + cityId,
                    type: 'GET',
                    success: function (res) {
                        if (res.status) {
                            $('#fareas').append(new Option('Select Area', '0'));
                            $.each(res.areas, function (key, value) {
                                let option = new Option(value + '-' + key, key);
                                $('#fareas').append(option);
                            });
                        }
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            });
            */


            mobileSort.change(function () {
                mobile_filter();
            });

            mobileVerified.click(function (e) {
                e.preventDefault();
                mobile_filter();
            });

            resetForm.submit(function (e) {
                e.preventDefault();
                mobile_filter();


                // if (data.verified !== '') {
                //     url += (useAnd ? '&' : '?') + 'verified=' + data.verified;
                //     useAnd = true;
                // }

                // if (data.posted_by !== '') {
                //     url += (useAnd ? '&' : '?') + 'posted_by=' + data.posted_by;
                //     useAnd = true;
                // }

                // if (data.sort_by !== '') {
                //     url += (useAnd ? '&' : '?') + 'sort_by=' + data.sort_by;
                // }
            });

            function mobile_filter() {
                let mCity = $('#city').val().split('-')[0];
                let mWants = $('#resetForm input[name=want]');
                let mType = $('#p_type').val();
                let mMnPrice = $('input[name=m_mn_price]').val();
                let mMxPrice = $('input[name=m_mx_price]').val();
                let mCond = [];

                let conditions = $('input[name=mcondition]');

                for (let i = 0; i < conditions.length; ++i) {
                    if ($(conditions[i]).is(':checked')) {
                        mCond.push($(conditions[i]).val());
                    }
                }

                let mWant = '{{ $cat }}';
                mWants.each(function (want) {
                    if ($(mWants[want]).prop("checked")) {
                        mWant = $(mWants[want]).val();
                    }
                });

                let url = '{{ route('web.property') }}';
                if (mCity !== '') {
                    url += (mWant !== '' ? '/' + mWant : '/all');
                    url += (mType !== '' ? '/' + mType : '/all');
                    url += '/' + mCity;
                } else if (mType !== '') {
                    url += '/' + mWant;
                    url += (mType !== '' ? '/' + mType : '/all');
                } else if (mWant !== '') {
                    url += '/' + mType;
                }

                let useAnd = false;
                if ($('#fareas').val()) {
                    if ($('#fareas').val().split('-')[1] > 0) {
                        url += '?area=' + $('#fareas').val().split('-')[1];
                        useAnd = true;
                    }
                }
                if (mCond.length > 0) {
                    url += (useAnd ? '&' : '?') + 'condition=' + mCond.join(',');
                    useAnd = true;
                }

                if (mMnPrice !== '') {
                    url += (useAnd ? '&' : '?') + 'min_price=' + mMnPrice;
                    useAnd = true;
                }

                if (mMxPrice !== '') {
                    url += (useAnd ? '&' : '?') + 'max_price=' + mMxPrice;
                    useAnd = true;
                }

                url += (useAnd ? '&' : '?') + 'verified=' + (parseInt(mobileVerified.data('verified')) === 0 ? 1 : 0);
                useAnd = true;

                if (mobileSort.val()) {
                    url += (useAnd ? '&' : '?') + 'sort_by=' + mobileSort.val();
                    useAnd = true;
                }

                window.location = url;
            }

            // $('.multipleSelect').fastselect();
        });

        // reset form
        function resetFunction() {
            document.getElementById("resetForm").reset();
        }
    </script>
@endpush
