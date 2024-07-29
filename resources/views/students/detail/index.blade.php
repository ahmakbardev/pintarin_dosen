@extends('layouts.layout')

@section('content')
    <div class="container-index px-0 w-full relative">
        <div id="loading-overlay" class="fixed inset-0 flex items-center justify-center bg-white bg-opacity-75 z-50 hidden">
            <div class="loader">Loading...</div>
        </div>

        <div class="px-8">
            <h1 class="text-2xl font-medium">Progres Belajar</h1>

            <!-- Nav Tabs -->
            <ul class="flex mt-5 gap-3 flex-wrap" id="tabs">
                <li>
                    <button
                        class="tab-button active py-2 px-5 bg-primary border border-primary text-white text-base font-medium rounded-full hover:ring transition-all ease-in-out"
                        data-tab="tab-prinsip">Prinsip Pembelajaran</button>
                </li>
                <li>
                    <button
                        class="tab-button py-2 px-5 border border-primary text-primary text-base font-medium rounded-full hover:ring hover:bg-primary hover:text-white transition-all ease-in-out"
                        data-tab="tab-pengembangan">Pengembangan Asesmen</button>
                </li>
                <li>
                    <button
                        class="tab-button py-2 px-5 border border-primary text-primary text-base font-medium rounded-full hover:ring hover:bg-primary hover:text-white transition-all ease-in-out"
                        data-tab="tab-ptk">PTK</button>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content mt-5">
                @include('students.detail.tabs.prinsip')
                @include('students.detail.tabs.pengembangan')
                @include('students.detail.tabs.ptk')
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Show loading overlay
            function showLoading() {
                $('#loading-overlay').removeClass('hidden');
            }

            // Hide loading overlay
            function hideLoading() {
                $('#loading-overlay').addClass('hidden');
            }

            // Function to update URL hash
            function updateURLHash(tabId) {
                history.pushState(null, null, '#' + tabId);
            }

            // Function to activate tab from hash or localStorage
            function activateTabFromHashOrStorage() {
                let tabId = window.location.hash.substring(1) || localStorage.getItem('activeTab');
                if (!tabId || !$(`#${tabId}`).length) {
                    tabId = 'tab-prinsip'; // Default tab
                }
                $(`.tab-button[data-tab="${tabId}"]`).click();
            }

            // Tabs functionality
            $('.tab-button').click(function() {
                showLoading();
                $('.tab-button').removeClass('active bg-primary text-white');
                $(this).addClass('active bg-primary text-white');

                $('.tab-pane').addClass('hidden');
                const targetTab = $(this).data('tab');
                $('#' + targetTab).removeClass('hidden');

                // Update URL hash and localStorage
                updateURLHash(targetTab);
                localStorage.setItem('activeTab', targetTab);

                hideLoading();
            });

            // Initial hide loading overlay
            hideLoading();

            // Activate tab from hash or localStorage on page load
            activateTabFromHashOrStorage();
        });
    </script>

    <style>
        .hidden {
            display: none;
        }

        .accordion-button.collapsed svg {
            transform: rotate(0);
        }

        .accordion-collapse {
            visibility: visible !important;
        }

        /* Loader styles */
        #loading-overlay {
            background-color: rgba(255, 255, 255, 0.8);
        }

        .loader {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .tab-button {
                width: 100%;
                text-align: center;
            }
        }
    </style>
@endsection
