@extends('layouts.checkout')
@section('title', 'Checkout Detail')

@section('content')
<main>
    <section class="section-breadcrumb-heading">
    </section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col p-0">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                Paket Travel
                            </li>
                            <li class="breadcrumb-item">
                                Details
                            </li>
                            <li class="breadcrumb-item active">
                                Checkout
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 pl-0">
                    <div class="card card-details">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h1>Whos going ?</h1>
                        <p>Trip to {{$item->travel_package->title}}, {{$item->travel_package->location}}</p>
                        <div class="attendee">
                            <table class="table table-responsive-sm text-center">
                                <thead>
                                    <tr>
                                        <td>Picture</td>
                                        <td>Name</td>
                                        <td>Nationality</td>
                                        <td>VISA</td>
                                        <td>Passport</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                   @forelse ($item->details as $detail)
                                    <tr>
                                        <td>
                                            <img src="https://ui-avatars.com/api/?name={{ $detail->username }}" height="60" class="rounded-circle">
                                        </td>
                                        <td class="align-middle">
                                            {{$detail->username}}
                                        </td>
                                        <td class="align-middle">
                                            {{$detail->nationality}}
                                        </td>
                                        <td class="align-middle">
                                            {{$detail->is_visa ? '30 DAYS' : 'N/A'}}
                                        </td>
                                        <td class="align-middle">
                                            {{ \Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'Inactive' }}
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{route('checkout-remove', $detail->id)}}">
                                                <img src="{{url('./frontend/images/logo/logo assets/logo icon/ic_remove.png')}}">
                                            </a>
                                        </td>
                                    </tr>
                                   @empty
                                       <tr>
                                           <td class="text-center" colspan="6">
                                               No Visitor
                                           </td>
                                       </tr>
                                   @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="member mt-3">
                            <h1>Add Members</h1>
                            <form action="{{ route('checkout-create', $item->id) }}" class="form-inline" method="POST">
                                @csrf
                                <label for="username" class="sr-only">Username</label>
                                <input type="text" name="username" id="username" placeholder="Username" class="form-control mb-2 mr-sm-2">

                                <label for="nationality" class="sr-only">Nationality</label>
                                <input type="text" name="nationality" id="nationality" placeholder="Nationality" required class="form-control mb-2 mr-sm-2" style="width: 50px">
                                
                                <label for="is_visa" class="sr-only">Visa</label>
                                <select name="is_visa" id="is_visa" class="custom-select mb-2 mr-sm2">
                                    <option value="" selected>VISA</option>
                                    <option value="0">N/A</option>
                                    <option value="1">30 Days</option>
                                </select>

                                <label for="doe_passport" class="sr-only">DOE Passport</label>
                                <div class="input-group mb-2 mr-sm-2 ml-sm-2">
                                    <input type="text" class="form-control datepicker" id="doe_passport" placeholder="DOE Passport" name="doe_passport">
                                </div>

                                <button type="submit" class="btn btn-add mb-2 px-4">Add Now</button>
                            </form>
                            <h3 class="mt-2 mb-0">Note</h3>
                            <p class="disclaimer mb-0">You are only able to add member that registered in FRIZ application.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Trip Informations</h2>
                        <table class="trips-information">
                            <tr>
                                <th width=50%>Members</th>
                                <td width=50% class="text-right">{{$item->details->count()}} Persons</td>
                            </tr>
                            <tr>
                                <th width=50%>Additional VISA</th>
                                <td width=50% class="text-right">${{$item->additional_visa}}</td>
                            </tr>
                            <tr>
                                <th width=50%>Trip Price</th>
                                <td width=50% class="text-right">$ {{$item->travel_package->price}}/Person</td>
                            </tr>
                            <tr>
                                <th width=50%>Sub Total</th>
                                <td width=50% class="text-right">${{$item->transaction_total}}</td>
                            </tr>
                            <tr>
                                <th width=50%>Total(+Unique Code)</th>
                                <td width=50% class="text-right text-total">
                                    <span class="text-green">${{$item->transaction_total}},</span>
                                    <span class="text-orange">{{mt_rand(0,99)}}</span>
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <h2>Payments</h2>
                        <p>Please complete payment before you continue the wonderful trip.</p>
                        <div class="bank">
                            <div class="bank-item pb-3 mt-2">
                                <img src="{{url('frontend/images/logo/logo assets/logo icon/ic_bank.png')}}" class="bank-image">
                                <div class="description">
                                    <h3>PT Friz Indonesia</h3>
                                    <p>Bank Central Asia <br> 148- 00 - 1467 - 423</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="bank-item pb-3 mt-2">
                                <img src="{{url('frontend/images/logo/logo assets/logo icon/ic_bank.png')}}" class="bank-image">
                                <div class="description">
                                    <h3>PT Friz Indonesia</h3>
                                    <p>Bank Mandiri <br> 148 - 48 - 1459 - 173</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="join-container">
                        <a href="{{route('checkout_success', $item->id)}}" class="btn btn-block btn-join-now mt-3 py-2"> I Have Made Payment</a>
                        <a href="{{route('detail', $item->travel_package->slug )}}" class="btn btn-block btn-cancel mt-3 py-2"> Cancel Payment</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('addOn-style')
    <link rel="stylesheet" href="{{url('frontend/libraries/gijgo/css/gijgo.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/styles/main.css')}}">
@endpush

@push('addOn-script')
<script src="{{url('frontend/libraries/gijgo/js/gijgo.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            uiLibrary: 'bootstrap4',
            icons: {
                rightIcon: '<img src="{{url('./frontend/images/logo/logo assets/logo icon/ic_date.png')}}"/>'
            }
        });
    });
</script>
@endpush