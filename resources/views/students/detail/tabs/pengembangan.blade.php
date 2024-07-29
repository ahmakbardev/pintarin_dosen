<div id="tab-pengembangan" class="tab-pane hidden">
    <!-- Accordion for Pengembangan Asesmen -->
    <div class="accordion" id="accordionPengembangan">
        <!-- Accordion Item 1 -->
        <div class="accordion-item mb-3" id="accordion-item-1-pengembangan">
            <h2 class="accordion-header bg-primary text-white rounded-t-xl" id="headingOnePengembangan">
                <button
                    class="accordion-button flex justify-between items-center w-full p-4 text-left bg-gray-100 border-b transition-all ease-in-out focus:outline-none"
                    type="button" data-toggle="collapse" data-target="#collapseOnePengembangan" aria-expanded="true">
                    <div class="flex flex-col w-full">
                        <span>Asesmen 1</span>
                        <span class="text-lg font-medium">Deskripsi Asesmen 1</span>
                        <div class="flex items-center mt-2 w-1/3">
                            <div class="w-full bg-gray-300 rounded-full bg-white h-2.5 dark:bg-gray-700 relative">
                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: 75%;"></div>
                            </div>
                            <span class="ml-2 text-sm font-medium">75%</span>
                        </div>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-chevron-down transition-transform"
                        id="iconOnePengembangan">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
            </h2>
            <div id="collapseOnePengembangan"
                class="accordion-collapse rounded-b-xl border-x border-b border-grayScale-300 collapse show text-black"
                aria-labelledby="headingOnePengembangan">
                <div class="accordion-body p-4 flex flex-col">
                    <h1>aaaa</h1>
                    <strong>This is the first item's accordion body.</strong> It is shown by default, until
                    the collapse plugin adds the appropriate classes that we use to style each element.
                </div>
            </div>
        </div>
        <!-- Accordion Item 2 -->
        <div class="accordion-item mb-3 rounded-b-xl" id="accordion-item-2-pengembangan">
            <h2 class="accordion-header bg-primary text-white rounded-t-xl" id="headingTwoPengembangan">
                <button
                    class="accordion-button flex justify-between items-center w-full p-4 text-left bg-gray-100 border-b transition-all ease-in-out focus:outline-none collapsed"
                    type="button" data-toggle="collapse" data-target="#collapseTwoPengembangan" aria-expanded="false">
                    <div class="flex flex-col w-full">
                        <span>Asesmen 2</span>
                        <span class="text-lg font-medium">Deskripsi Asesmen 2</span>
                        <div class="flex items-center mt-2 w-1/3">
                            <div class="w-full bg-gray-300 rounded-full bg-white h-2.5 dark:bg-gray-700 relative">
                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: 75%;"></div>
                            </div>
                            <span class="ml-2 text-sm font-medium">75%</span>
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-chevron-down transition-transform"
                        id="iconTwoPengembangan">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
            </h2>
            <div id="collapseTwoPengembangan"
                class="accordion-collapse rounded-b-xl border-x border-b border-grayScale-300 collapse text-black"
                aria-labelledby="headingTwoPengembangan" style="display: none;">
                <div class="accordion-body p-4">
                    <strong>This is the second item's accordion body.</strong> It is hidden by default,
                    until the collapse plugin adds the appropriate classes that we use to style each
                    element.
                </div>
            </div>
        </div>
        <!-- Accordion Item 3 -->
        <div class="accordion-item mb-3 rounded-b-xl" id="accordion-item-3-pengembangan">
            <h2 class="accordion-header bg-primary text-white rounded-t-xl" id="headingThreePengembangan">
                <button
                    class="accordion-button flex justify-between items-center w-full p-4 text-left bg-gray-100 border-b transition-all ease-in-out focus:outline-none collapsed"
                    type="button" data-toggle="collapse" data-target="#collapseThreePengembangan"
                    aria-expanded="false">
                    <div class="flex flex-col w-full">
                        <span>Asesmen 3</span>
                        <span class="text-lg font-medium">Deskripsi Asesmen 3</span>
                        <div class="flex items-center mt-2 w-1/3">
                            <div class="w-full bg-gray-300 rounded-full bg-white h-2.5 dark:bg-gray-700 relative">
                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: 75%;"></div>
                            </div>
                            <span class="ml-2 text-sm font-medium">75%</span>
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-chevron-down transition-transform"
                        id="iconThreePengembangan">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
            </h2>
            <div id="collapseThreePengembangan"
                class="accordion-collapse rounded-b-xl border-x border-b border-grayScale-300 collapse text-black"
                aria-labelledby="headingThreePengembangan" style="display: none;">
                <div class="accordion-body p-4">
                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until
                    the collapse plugin adds the appropriate classes that we use to style each element.
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Accordion functionality for Pengembangan Asesmen
        $('#accordionPengembangan .accordion-button').click(function() {
            const target = $(this).data('target');
            const $target = $(target);
            const isExpanded = $target.hasClass('show');

            // Close all accordions except the one being clicked
            $('#accordionPengembangan .accordion-collapse').not($target).slideUp("ease-in-out")
                .removeClass('show').prev()
                .find('svg')
                .removeClass('rotate-180');

            $('#accordionPengembangan .accordion-header').not($(this).closest('.accordion-header'))
                .addClass('rounded-b-xl');

            if (isExpanded) {
                $target.slideUp("ease-in-out").removeClass('show');
                $(this).closest('.accordion-header').addClass('rounded-b-xl');
            } else {
                $target.slideDown("ease-in-out").addClass('show');
                $(this).closest('.accordion-header').removeClass('rounded-b-xl');
            }
        });

        // Ensure all accordion items are closed on page load, except the first one
        $('#accordionPengembangan .accordion-collapse').not('#collapseOnePengembangan').removeClass('show');
        $('#accordionPengembangan .accordion-collapse').not('#collapseOnePengembangan').prev().find('svg')
            .removeClass('rotate-180');
        $('#accordionPengembangan .accordion-header').not('#headingOnePengembangan').addClass('rounded-b-xl');

        feather.replace();
    });avbar
</script>
