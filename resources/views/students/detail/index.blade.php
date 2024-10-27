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
                <li class="relative">
                    <button
                        class="tab-button py-2 px-5 border border-primary text-primary text-base font-medium rounded-full hover:ring hover:bg-primary hover:text-white transition-all ease-in-out"
                        data-tab="tab-ptk">PTK</button>
                    <ul class="absolute left-0 z-[2] mt-2 w-48 hidden sub-menu bg-white shadow-lg rounded-lg">
                        <li>
                            <button
                                class="sub-tab-button w-full text-left py-2 px-4 hover:bg-primary hover:text-white transition-all ease-in-out"
                                data-sub-tab="tab-ptk-proposal">Proposal</button>
                        </li>
                        <li>
                            <button
                                class="sub-tab-button w-full text-left py-2 px-4 hover:bg-primary hover:text-white transition-all ease-in-out"
                                data-sub-tab="tab-ptk-seminar">Seminar</button>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content mt-5">
                @include('students.detail.tabs.prinsip')
                @include('students.detail.tabs.pengembangan')
                @include('students.detail.tabs.ptk-proposal')
                @include('students.detail.tabs.ptk-seminar')
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

            // Function to update URL hash and localStorage
            function updateURLHashAndStorage(tabId) {
                history.pushState(null, null, '#' + tabId);
                localStorage.setItem('activeTab', tabId); // Save active tab to localStorage
            }

            // Function to activate tab or sub-tab from URL hash or localStorage
            function activateTabFromHashOrStorage() {
                let tabId = window.location.hash.substring(1) || localStorage.getItem('activeTab');
                if (!tabId || !$(`#${tabId}`).length) {
                    tabId = 'tab-prinsip'; // Default tab
                }

                // Check if the tab is a sub-tab of PTK
                if (tabId === 'tab-ptk-proposal' || tabId === 'tab-ptk-seminar') {
                    // Activate PTK tab and sub-tab
                    $('.tab-button[data-tab="tab-ptk"]').trigger('click'); // Activate PTK tab
                    $(`.sub-tab-button[data-sub-tab="${tabId}"]`).trigger('click'); // Activate the sub-tab
                } else {
                    // Activate main tab
                    $(`.tab-button[data-tab="${tabId}"]`).trigger('click'); // Trigger click event for the tab
                }
            }

            // Handle tab-button clicks
            $('.tab-button').click(function() {
                const targetTab = $(this).data('tab');

                if (targetTab === 'tab-ptk') {
                    $('.sub-menu').toggleClass('hidden'); // Toggle PTK dropdown visibility
                } else {
                    // Remove active state from all buttons and hide all tab contents
                    $('.tab-button').removeClass('active bg-primary text-white');
                    $('.tab-pane').addClass('hidden'); // Ensure all tab content is hidden

                    // Set the clicked tab as active and show corresponding content
                    $(this).addClass('active bg-primary text-white');
                    $('#' + targetTab).removeClass('hidden');

                    // Ensure PTK sub-menu is hidden when clicking other tabs
                    $('.sub-menu').addClass('hidden');

                    // Update URL hash and save to localStorage
                    updateURLHashAndStorage(targetTab);
                }
            });

            // Sub-tabs functionality for PTK
            $('.sub-tab-button').click(function() {
                const subTab = $(this).data('sub-tab');

                // Remove active state from all main tab buttons
                $('.tab-button').removeClass('active bg-primary text-white');

                // Hide all other tab content
                $('.tab-pane').addClass('hidden'); // Ensure all other tab content is hidden
                $('#tab-ptk-proposal, #tab-ptk-seminar').addClass('hidden'); // Hide PTK related content too

                // Show the selected sub-tab content
                $('#' + subTab).removeClass('hidden');

                // Set PTK tab as active and hide the dropdown
                $('.tab-button[data-tab="tab-ptk"]').addClass('active bg-primary text-white');
                $('.sub-menu').addClass('hidden'); // Hide submenu after selection

                // Update URL hash and save to localStorage
                updateURLHashAndStorage(subTab);
            });

            // Activate the tab based on URL hash or localStorage when the page loads
            activateTabFromHashOrStorage();

            // Initial hide loading overlay
            hideLoading();
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
