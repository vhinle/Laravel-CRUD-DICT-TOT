@extends('layouts.app')

@section('content')
    <x-page-header pageTitle="Dashboard" btnCaption="Action Button Dashboard" class="bg-dark" />

    <div class="wrapper wrapper-content">
        <div class="animated fadeInRightBig">

            <!-- Widgets -->
            <div class="row">
                <!-- Widget -->
                <div class="col-4">
                    <x-widget icon="fa-bell" color="red-bg">

                        <x-slot name="title">
                            Errors
                        </x-slot>
                        <x-slot name="count">0</x-slot>
                        <x-slot name="description">
                            Urgent Cases
                        </x-slot>

                    </x-widget>
                </div>
                <!-- Widget -->
                <div class="col-4">
                    <x-widget icon="fa-users" color="yellow-bg">

                        <x-slot name="title">
                            Accounts
                        </x-slot>
                        <x-slot name="count">500</x-slot>
                        <x-slot name="description">
                            Active Subscribers
                        </x-slot>

                    </x-widget>
                </div>
                <!-- Widget -->
                <div class="col-4">
                    <x-widget icon="fa-support" color="lazur-bg">

                        <x-slot name="title">
                            Cases
                        </x-slot>
                        <x-slot name="count">0</x-slot>
                        <x-slot name="description">
                            Submitted Tickets
                        </x-slot>

                    </x-widget>
                </div>
            </div>
            <!-- Box -->
            <!--
                    <x-box>
                        <x-slot name="boxTitle">
                            Report for 2024
                            <small>Company Financial Status</small>
                        </x-slot>
                        <x-slot name="boxContent">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque numquam ab tempora, nulla voluptatum
                                quas corrupti rem dicta mollitia maxime consectetur temporibus eos, ad eius autem culpa nostrum
                                odit? Tempora.</p>
                        </x-slot>
                        <x-slot name="boxFooter">
                            <button type="button" class="btn btn-primary">Save</button>
                        </x-slot>
                    </x-box>
                        /Box -->


        </div>
    </div>
@endsection
