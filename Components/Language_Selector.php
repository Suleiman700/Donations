<div class="modal fade" id="country-selector">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content country-select-modal">
            <div class="modal-header">
                <h6 class="modal-title"><?php echo $app->get_word("language"); ?></h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <ul class="row p-3">
                    <li class="col-lg-6 mb-2">
                        <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block languageselector" id="en">
                            <span class="country-selector"><img alt="" src="../../assets/images/flags/us_flag.jpg" class="me-3 language"></span>ENGLISH
                        </a>
                    </li>
                    <li class="col-lg-6 mb-2">
                        <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block languageselector" id="ar">
                            <span class="country-selector"><img alt="" src="../../assets/images/flags/sa.svg" class="me-3 language"></span>العربية
                        </a>
                    </li>
                    <li class="col-lg-6 mb-2">
                        <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block languageselector" id="he">
                            <span class="country-selector"><img alt="" src="../../assets/images/flags/us_flag.jpg" class="me-3 language"></span>עברית
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- LANGUAGE -->
<script type="module" src="../../Requests/LanguageSelectorRequests/SetLanguage.js"></script>
<!--<script type="module" src="../../Scripts/Language_Selector.js"></script>-->

