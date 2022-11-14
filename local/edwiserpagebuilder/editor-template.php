<div class="p-0">
    <div id="top-panel">
        <div class="btn-group float-start ml-4 my-auto" role="group">
            <button class="btn btn-light p-2" title="Toggle left column" id="toggle-left-column-btn"
                data-vvveb-action="toggleLeftColumn" data-bs-toggle="button" aria-pressed="ture">
                <img src="../edwiserpagebuilder/js/libs/builder/icons/left-column-layout.svg" width="20px"
                    height="20px">
            </button>
            <button class="btn btn-light active p-2" title="Toggle right column" id="toggle-right-column-btn"
                data-vvveb-action="toggleRightColumn" data-bs-toggle="button" aria-pressed="false">
                <img src="../edwiserpagebuilder/js/libs/builder/icons/right-column-layout.svg" width="20px"
                    height="20px">
            </button>
        </div>
        <div class="btn-group float-start ms-5 responsive-btns" role="group">
            <button id="mobile-view" data-view="mobile" class="btn btn-light" title="Mobile view"
                data-vvveb-action="viewport">
                <i class="fa fa-mobile"></i>
            </button>
            <button id="tablet-view" data-view="tablet" class="btn btn-light" title="Tablet view"
                data-vvveb-action="viewport">
                <i class="fa fa-tablet"></i>
            </button>
            <button id="desktop-view" data-view="" class="btn btn-light active" title="Desktop view"
                data-vvveb-action="viewport">
                <i class="fa fa-laptop"></i>
            </button>
        </div>
        <div class="btn-group float-end me-3" role="group">
            <button class="btn btn-light" title="Undo (Ctrl/Cmd + Z)" id="undo-btn" data-vvveb-action="undo"
                data-vvveb-shortcut="ctrl+z">
                <i class="fa fa-undo"></i>
            </button>
            <button class="btn btn-light" title="Redo (Ctrl/Cmd + Shift + Z)" id="redo-btn" data-vvveb-action="redo"
                data-vvveb-shortcut="ctrl+shift+z">
                <i class="fa fa-repeat"></i>
            </button>
            <button class="btn-primary my-auto mx-3" id="save-btn">
                <i class="fa fa-save"></i> <span data-v-gettext>Save Changes</span>
            </button>
            <button type="button" class="editor-close px-3 btn btn-secondary border-0" aria-label="Close">
                <a href="<?php echo get_block_content_return_url();?>"><i class="fa fa-times"></i></a>
            </button>
        </div>
    </div>

    <div id="vvveb-builder" class="container-fluid">
        <input type='hidden' name='epb_get_blk_url' id='epb_get_blk_url'
            value="<?php echo get_block_content_url(); ?>" />
        <input type='hidden' name='epb_get_blk_id' id='epb_get_blk_id' value="<?php echo get_block_id(); ?>" />
        <div class="col-md-3 p-0" id='left-panel' style='display:none;'>
            <div class="component-properties">
                <ul class="nav nav-tabs nav-justified sticky-top" id="properties-tabs" role="tablist">
                    <li class="nav-item content-tab">
                        <a class="nav-link active" data-toggle="tab" href="#block-style-tab" role="tab"
                            aria-controls="components" aria-selected="false">
                            <i class="fa fa-paint-brush"></i>
                            <div><span>Block Style</span></div>
                        </a>
                    </li>
                    <li class="nav-item style-tab">
                        <a class="nav-link" data-toggle="tab" href="#script-tab" role="tab" aria-controls="blocks"
                            aria-selected="true">
                            <i class="fa fa-code"></i>
                            <div><span>Block Script</span></div>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id='block-style-tab' class="mx-1 tab-pane fade show active">
                        <textarea id='edwiser-block-style-editor' class="w-100" cols="30" rows="20"
                            placeholder='Start adding Block style here.'></textarea>
                    </div>
                    <div id='script-tab' class="mx-1 tab-pane fade show">
                        <textarea id='edwiser-block-script-editor' class="w-100" cols="30" rows="20"
                            placeholder='Start adding Block script here.'></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-0" id="canvas">
            <div id="iframe-wrapper">
                <div id="iframe-layer">
                    <div class="loading-message active">
                        <img src='../edwiserpagebuilder/js/libs/builder/icons/owl_loader.gif'>
                    </div>
                    <div id="highlight-box">
                        <div id="highlight-name"></div>
                        <div id="section-actions">
                            <a id="add-section-btn" href="" title="Add element"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div id="select-box">
                        <div id="wysiwyg-editor" class="default-editor">
                            <a id="bold-btn" href="" title="Bold">
                                <svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6,4h8a4,4,0,0,1,4,4h0a4,4,0,0,1-4,4H6Z" fill="none" stroke="#000"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                                    <path d="M6,12h9a4,4,0,0,1,4,4h0a4,4,0,0,1-4,4H6Z" fill="none" stroke="#000"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                                </svg>
                            </a>
                            <a id="italic-btn" href="" title="Italic">
                                <svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <line fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" x1="19" x2="10" y1="4" y2="4" />
                                    <line fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" x1="14" x2="5" y1="20" y2="20" />
                                    <line fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" x1="15" x2="9" y1="4" y2="20" />
                                </svg>
                            </a>
                            <a id="underline-btn" href="" title="Underline">
                                <svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6,4v7a6,6,0,0,0,6,6h0a6,6,0,0,0,6-6V4" fill="none" stroke="#000"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" y1="2 y2=" 2" />
                                    <line fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" x1="4" x2="20" y1="22" y2="22" />
                                </svg>
                            </a>
                            <a id="strike-btn" href="" title="Strikeout">
                                <del>S</del>
                            </a>
                            <div class="dropdown">
                                <a class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-align-left"></i>
                                </a>
                                <div id="justify-btn" class="dropdown-menu" aria-labelledby="edwiser-tab-file-upload">
                                    <a class="dropdown-item" href="#" data-value="Left"><i class="fa fa-align-left"></i>
                                        Align Left</a>
                                    <a class="dropdown-item" href="#" data-value="Center"><i
                                            class="fa fa-align-center"></i> Align Center</a>
                                    <a class="dropdown-item" href="#" data-value="Right"><i
                                            class="fa fa-align-right"></i> Align Right</a>
                                    <a class="dropdown-item" href="#" data-value="Full"><i
                                            class="fa fa-align-justify"></i> Align Justify</a>
                                </div>
                            </div>

                            <div class="separator"></div>
                            <a id="link-btn" href="" title="Create link">
                                <i class="fa fa-link"></i>
                            </a>

                            <div class="separator"></div>
                            <input id="fore-color" name="color" type="color" title="Color" pattern="#[a-f0-9]{6}"
                                class="form-control form-control-color">
                            <input id="back-color" name="background-color" type="color" title="Background Color"
                                pattern="#[a-f0-9]{6}" class="form-control form-control-color">

                            <div class="separator"></div>
                            <select id="font-size" class="form-select">
                                <option value="">Default</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                            </select>

                            <select id="font-familly" class="form-select">
                                <option value="">Default</option>
                                <option value="Arial, Helvetica, sans-serif">Arial</option>
                                <option value="'Lucida Sans Unicode', 'Lucida Grande', sans-serif">Lucida Grande
                                </option>
                                <option value="'Palatino Linotype', 'Book Antiqua', Palatino, serif">Palatino Linotype
                                </option>
                                <option value="'Times New Roman', Times, serif">Times New Roman</option>
                                <option value="Georgia, serif">Georgia, serif</option>
                                <option value="Tahoma, Geneva, sans-serif">Tahoma</option>
                                <option value="'Comic Sans MS', cursive, sans-serif">Comic Sans</option>
                                <option value="Verdana, Geneva, sans-serif">Verdana</option>
                                <option value="Impact, Charcoal, sans-serif">Impact</option>
                                <option value="'Arial Black', Gadget, sans-serif">Arial Black</option>
                                <option value="'Trebuchet MS', Helvetica, sans-serif">Trebuchet</option>
                                <option value="'Courier New', Courier, monospace">Courier New</option>
                                <option value="'Brush Script MT', sans-serif">Brush Script</option>
                            </select>
                        </div>

                        <div id="select-actions">
                            <a id="drag-btn" href="" title="Drag element"><i class="fa fa-arrows-alt"></i></a>
                            <a id="parent-btn" href="" title="Select parent" class="fa-rotate-180"><i
                                    class="fa fa-level-up"></i></a>
                            <a id="up-btn" href="" title="Move element up"><i class="fa fa-long-arrow-up"></i></a>
                            <a id="down-btn" href="" title="Move element down"><i class="fa fa-long-arrow-down"></i></a>
                            <a id="clone-btn" href="" title="Clone element"><i class="fa fa-copy"></i></a>
                            <a id="delete-btn" href="" title="Remove element"><i class="fa fa-trash"></i></a>
                        </div>
                        <div class="resize">
                            <!-- top -->
                            <div class="top-left"></div>
                            <div class="top-center"></div>
                            <div class="top-right"></div>
                            <!-- center -->
                            <div class="center-left"></div>
                            <div class="center-right"></div>
                            <!-- bottom -->
                            <div class="bottom-left"></div>
                            <div class="bottom-center"></div>
                            <div class="bottom-right"></div>
                        </div>
                    </div>

                    <!-- add section box -->
                    <div id="add-section-box" class="drag-elements">
                        <div class="header">
                            <div class="d-block section-box-actions popover-header">
                                <div class='d-flex justify-content-end'>
                                    <div class="small my-auto">
                                        <div class="d-inline">
                                            <input type="radio" id="add-section-insert-mode-after" value="after"
                                                name="add-section-insert-mode" class="form-check-input">
                                            <label class="form-check-label mr-4"
                                                for="add-section-insert-mode-after">After</label>
                                        </div>
                                        <div class="d-inline">
                                            <input type="radio" id="add-section-insert-mode-inside" value="inside"
                                                checked="checked" name="add-section-insert-mode"
                                                class="form-check-input">
                                            <label class="form-check-label"
                                                for="add-section-insert-mode-inside">Inside</label>
                                        </div>
                                    </div>
                                    <div id="close-section-btn" class="btn ml-2"><i class="fa fa-times"></i></div>
                                </div>
                                <div class="popover-body p-0" id="box-components" role="tabpanel"
                                    aria-labelledby="components-tab">
                                    <div class="search">
                                        <input class="form-control component-search" placeholder="Search components"
                                            type="text" data-vvveb-action="addBoxComponentSearch" data-vvveb-on="keyup">
                                        <button class="clear-backspace" data-vvveb-action="clearComponentSearch">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>

                                    <div>
                                        <ul class="components-list clearfix" data-type="addbox">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="drop-highlight-box"></div>
                    </div>
                </div>
                <iframe src="" id="iframe1" class='epb-editor-iframe'>
                </iframe>
            </div>
            <div id="bottom-panel">
                <div class='epb-bottom-action'>
                    <div class="breadcrumb-navigator px-2" style="--bs-breadcrumb-divider: '>';">
                        <ol class="breadcrumb"></ol>
                    </div>
                    <div class="btn-group" role="group">
                        <div id="toggleEditorJsExecute" class="form-check mt-1 pr-1" style="display:none">
                            <input type="checkbox" class="form-check-input" id="runjs" name="runjs"
                                data-vvveb-action="toggleEditorJsExecute" />
                            <label class="form-check-label" for="runjs"><small>Run javascript code on
                                    edit</small></label>
                        </div>
                        <button id="code-editor-btn" data-view="mobile" class="btn btn-sm btn-light btn-sm"
                            title="Code editor" data-vvveb-action="toggleEditor">
                            <i class="fa fa-code"></i> Code editor
                        </button>
                    </div>
                </div>
                <div id="vvveb-code-editor" class="overflow-auto">
                    <textarea class="form-control d-none"></textarea>
                </div>
            </div>
        </div>
        <!-- Ifrem wrapper complete -->

        <div class="col-md-3 p-0" id="right-panel">
            <div class="component-properties eb-block-settings">
                <ul class="nav nav-tabs nav-justified sticky-top" id="properties-tabs" role="tablist">
                    <li class="nav-item content-tab">
                        <a class="nav-link active" data-toggle="tab" href="#content-tab" role="tab"
                            aria-controls="components" aria-selected="false">
                            <i class="fa fa-sliders"></i>
                            <div><span>Content</span></div>
                        </a>
                    </li>
                    <li class="nav-item style-tab">
                        <a class="nav-link" data-toggle="tab" href="#style-tab" role="tab" aria-controls="blocks"
                            aria-selected="true">
                            <i class="fa fa-paint-brush"></i>
                            <div><span>Style</span></div>
                        </a>
                    </li>
                    <li class="nav-item advanced-tab">
                        <a class="nav-link" data-toggle="tab" href="#advanced-tab" role="tab" aria-controls="blocks"
                            aria-selected="false">
                            <i class="fa fa-wrench"></i>
                            <div><span>Advanced</span></div>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="content-tab" data-section="content" role="tabpanel"
                        aria-labelledby="content-tab">
                        <div class="alert alert-dismissible fade show alert-light m-3" role="alert">
                            <strong>No selected element!</strong><br> Click on an element to edit.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <div class="tab-pane fade show " id="style-tab" data-section="style" role="tabpanel"
                        aria-labelledby="style-tab">
                    </div>
                    <div class="tab-pane fade show" id="advanced-tab" data-section="advanced" role="tabpanel"
                        aria-labelledby="advanced-tab">
                        <div class="alert alert-dismissible fade show alert-info m-3" role="alert">
                            <strong>No advanced properties!</strong><br> This component does not have advanced
                            properties.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div id='epbtaostwrap' aria-live="polite" aria-atomic="true" style="position: relative;">
    <div style="position: absolute; bottom: 0; right: 1rem;">
        <div id='epb-toast-message' class="alert d-none" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-msg"></div>
            <button type="button" class="close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>

<div id="edwiser-page-builder-fp" class="modal fade modal-static" tabindex="-1" role="modal"
    aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xs">
        <div class="modal-content">
            <div class='modal-header d-block border-0 p-0'>
                <div class='d-flex mx-4 mt-4'>
                    <h4 class=''><?php echo get_string( 'mediaselpopuptite', 'local_edwiserpagebuilder' );?></h4>
                    <button class="close ml-auto" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <ul class="nav nav-tabs" id="file-piker-tabs" role="tablist">
                    <li class='nav-item'>
                        <a class="nav-link " data-toggle="tab" href="#edwiser-tab-file-upload" role="tab"
                            aria-controls="blocks" aria-selected="true">
                            <span><?php echo get_string( 'mediaselpopuptab1tite', 'local_edwiserpagebuilder' );?></span></a>
                    </li>
                    <li class='nav-item'>
                        <a class="nav-link active" data-toggle="tab" href="#edwiser-tab-file-selector" role="tab"
                            aria-controls="components" aria-selected="false">
                            <span><?php echo get_string( 'mediaselpopuptab2tite', 'local_edwiserpagebuilder' );?></span></a>
                    </li>
                </ul>
            </div>
            <div class="modal-body d-flex p-0">
                <div class='flex-grow-1 tab-content'>
                    <div id='epbfm-savefile' class="alert d-none" role="alert"></div>
                    <div id="edwiser-tab-file-upload" class="tab-pane fade p-4 flex-grow-1" role="tabpanel"
                        aria-labelledby="edwiser-tab-file-select"></div>
                    <div id="edwiser-tab-file-selector" class='tab-pane fade show active flex-grow-1' role="tabpanel"
                        aria-labelledby="edwiser-tab-file-upload">
                        <div class='d-flex flex- justify-content-between pl-4 w-100'>
                            <div id='epb_media_list_wrap'></div>
                            <div id='epb_media_list_empty'>
                                <?php echo get_string( 'nomediafile', 'local_edwiserpagebuilder' );?>
                            </div>
                            <input type="hidden" name="file_list_fromlimit" id='file_list_fromlimit' value="0" />
                            <div class='border bg-grey-200 media-details-wrap'>
                                <div class='media-details d-none p-3' id='media-details'>
                                    <h5 class='text-uppercase bold text-black-50'>
                                        <?php echo get_string( 'mediaselpopuplbldetials', 'local_edwiserpagebuilder' );?>
                                    </h5>
                                    <div id='epbfm-deletefile' class="d-none alert" role="alert"></div>
                                    <div class="details">
                                        <img class='epb-selected-file' id='epb-selected-file' src='' alt='' width='200'
                                            height='auto' />
                                        <div class="bold" id='epbmd-name'></div>
                                        <div id='epbmd-time'></div>
                                        <div id='epbmd-size'></div>
                                        <div id='epbmd-dimensions'></div>
                                        <input type='hidden' name='epbfm-file-name' id='epbfm-file-name' value='' />
                                        <input type='hidden' name='epbfm-file-path' id='epbfm-file-path' value='' />
                                        <input type='hidden' name='epbfm-file-id' id='epbfm-file-id' value='' />
                                        <input type='hidden' name='epbfm-media-id' id='epbfm-media-id' value='' />
                                        <button type="button" id='epbmd-btn-delete-file'
                                            class="p-0 btn btn-link text-danger"><?php echo get_string( 'mediadeletebtn', 'local_edwiserpagebuilder' );?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class='btn btn-primary ml-auto d-none mt-2'
                    id='epb-save-popup-media'><?php echo get_string( 'mediasavebtn', 'local_edwiserpagebuilder' );?></button>
                <button class='btn btn-primary ml-auto epb-btn-setfile disabled' id='epb-btn-setfile'
                    data-dismiss="modal"
                    aria-label="Close"><?php echo get_string( 'mediaselectbtn', 'local_edwiserpagebuilder' );?></button>
            </div>
        </div>
    </div>
</div>


<!-- templates -->

<script id="vvveb-input-textinput" type="text/html">
<div>
    <input name="{%=key%}" type="text" class="form-control" />
</div>

</script>

<script id="vvveb-input-textareainput" type="text/html">
<div>
    <textarea name="{%=key%}" rows="3" class="form-control" />
</div>

</script>

<script id="vvveb-input-checkboxinput" type="text/html">
<div class="form-check">
    <input name="{%=key%}" class="form-check-input" type="checkbox" id="{%=key%}_check">
    <label class="form-check-label" for="{%=key%}_check">{% if (typeof text !== 'undefined') { %} {%=text%}
        {% } %}</label>
</div>

</script>

<script id="vvveb-input-radioinput" type="text/html">
<div>
    {% for ( var i = 0; i < options.length; i++ ) { %}
    <label
        class="form-check-input  {% if (typeof inline !== 'undefined' && inline == true) { %}custom-control-inline{% } %}"
        title="{%=options[i].title%}">
        <input name="{%=key%}" class="form-check-input" type="radio" value="{%=options[i].value%}" id="{%=key%}{%=i%}"
            {%if (options[i].checked) { %}checked="{%=options[i].checked%}" {% } %}>
        <label class="form-check-label" for="{%=key%}{%=i%}">{%=options[i].text%}</label>
    </label>

    {% } %}

</div>

</script>

<script id="vvveb-input-radiobuttoninput" type="text/html">
<div class="btn-group {%if (extraclass) { %}{%=extraclass%}{% } %} clearfix" role="group">
    {% var namespace = 'rb-' + Math.floor(Math.random() * 100); %}

    {% for ( var i = 0; i < options.length; i++ ) { %}

    <input name="{%=key%}" class="btn-check" type="radio" value="{%=options[i].value%}"
        id="{%=namespace%}{%=key%}{%=i%}" {%if (options[i].checked) { %}checked="{%=options[i].checked%}" {% } %}
        autocomplete="off">
    <label class="btn btn-outline-primary {%if (options[i].extraclass) { %}{%=options[i].extraclass%}{% } %}"
        for="{%=namespace%}{%=key%}{%=i%}" title="{%=options[i].title%}">
        {%if (options[i].icon) { %}<i class="{%=options[i].icon%}"></i>{% } %}
        {%=options[i].text%}
    </label>

    {% } %}

</div>

</script>

<script id="vvveb-input-toggle" type="text/html">
<div class="toggle">
    <input type="checkbox" name="{%=key%}" value="{%=on%}" {%if (off) { %} data-value-off="{%=off%}" {% } %}
        {%if (on) { %} data-value-on="{%=on%}" {% } %} class="toggle-checkbox" id="{%=key%}">
    <label class="toggle-label" for="{%=key%}">
        <span class="toggle-inner"></span>
        <span class="toggle-switch"></span>
    </label>
</div>

</script>

<script id="vvveb-input-header" type="text/html">
<h6 class="header">{%=header%}</h6>

</script>

<script id="vvveb-input-select" type="text/html">
<div>
    <select class="form-select">
        {% for ( var i = 0; i < options.length; i++ ) { %}
        <option value="{%=options[i].value%}">{%=options[i].text%}</option>
        {% } %}
    </select>
</div>

</script>

<script id="vvveb-input-icon-select" type="text/html">
<div class="input-list-select">
    <div class="elements">
        <div class="row row-cols-4">
            {% for ( var i = 0; i < options.length; i++ ) { %}
            <div class="col">
                <div class="element">
                    {%=options[i].value%}
                    <label>{%=options[i].text%}</label>
                </div>
            </div>
            {% } %}
        </div>
    </div>
</div>

</script>

<script id="vvveb-input-dateinput" type="text/html">
<div>
    <input name="{%=key%}" type="date" class="form-control" {% if (typeof min_date === 'undefined') { %}
        min="{%=min_date%}" {% } %} {% if (typeof max_date === 'undefined') { %} max="{%=max_date%}" {% } %} />
</div>

</script>

<script id="vvveb-input-listinput" type="text/html">
<div class="row">
    {% for ( var i = 0; i < options.length; i++ ) { %}
    <div class="col-6">
        <div class="input-group">
            <input name="{%=key%}_{%=i%}" type="text" class="form-control" value="{%=options[i].text%}" />
            <div class="input-group-append">
                <button class="input-group-text btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        </div>
        <br />
    </div>
    {% } %}
    {% if (typeof hide_remove === 'undefined') { %}
    <div class="col-12">
        <button class="btn btn-sm btn-outline-primary">
            <i class="fa fa-trash"></i> Add new
        </button>
    </div>
    {% } %}
</div>

</script>

<script id="vvveb-input-grid" type="text/html">
<div class="row">
    <div class="col-6 mb-2">
        <label>Flexbox</label>
        <select class="form-select" name="col">

            <option value="">None</option>
            {% for ( var i = 1; i <= 12; i++ ) { %}
            <option value="{%=i%}" {% if ((typeof col !== 'undefined') && col == i) { %} selected {% } %}>{%=i%}
            </option>
            {% } %}
        </select>
    </div>
    <div class="col-6 mb-2">
        <label>Extra small</label>
        <select class="form-select" name="col-xs">
            <option value="">None</option>
            {% for ( var i = 1; i <= 12; i++ ) { %}
            <option value="{%=i%}" {% if ((typeof col_xs !== 'undefined') && col_xs == i) { %} selected {% } %}>{%=i%}
            </option>
            {% } %}
        </select>
    </div>
    <div class="col-6 mb-2">
        <label>Medium</label>
        <select class="form-select" name="col-md">
            <option value="">None</option>
            {% for ( var i = 1; i <= 12; i++ ) { %}
            <option value="{%=i%}" {% if ((typeof col_md !== 'undefined') && col_md == i) { %} selected {% } %}>{%=i%}
            </option>
            {% } %}
        </select>
    </div>
    <div class="col-6 mb-2">
        <label>Large</label>
        <select class="form-select" name="col-lg">
            <option value="">None</option>
            {% for ( var i = 1; i <= 12; i++ ) { %}
            <option value="{%=i%}" {% if ((typeof col_lg !== 'undefined') && col_lg == i) { %} selected {% } %}>{%=i%}
            </option>
            {% } %}
        </select>
    </div>
    <div class="col-6 mb-2">
        <label>Extra large </label>
        <select class="form-select" name="col-xl">
            <option value="">None</option>
            {% for ( var i = 1; i <= 12; i++ ) { %}
            <option value="{%=i%}" {% if ((typeof col_lg !== 'undefined') && col_lg == i) { %} selected {% } %}>{%=i%}
            </option>
            {% } %}
        </select>
    </div>
    <div class="col-6 mb-2">
        <label>Extra extra large</label>
        <select class="form-select" name="col-xxl">
            <option value="">None</option>
            {% for ( var i = 1; i <= 12; i++ ) { %}
            <option value="{%=i%}" {% if ((typeof col_lg !== 'undefined') && col_lg == i) { %} selected {% } %}>{%=i%}
            </option>
            {% } %}
        </select>
    </div>
    {% if (typeof hide_remove === 'undefined') { %}
    <div class="col-12">
        <button class="btn btn-sm btn-outline-light text-danger">
            <i class="fa fa-trash"></i> Remove
        </button>
    </div>
    {% } %}
</div>

</script>

<script id="vvveb-input-textvalue" type="text/html">
<div class="row">
    <div class="col-6 mb-1">
        <label>Value</label>
        <input name="value" type="text" value="{%=value%}" class="form-control" />
    </div>
    <div class="col-6 mb-1">
        <label>Text</label>
        <input name="text" type="text" value="{%=text%}" class="form-control" />
    </div>
    {% if (typeof hide_remove === 'undefined') { %}
    <div class="col-12">
        <button class="btn btn-sm btn-outline-light text-danger">
            <i class="fa fa-trash"></i> Remove
        </button>
    </div>
    {% } %}
</div>

</script>

<script id="vvveb-input-rangeinput" type="text/html">
<div class="input-range">
    <input name="{%=key%}" type="range" min="{%=min%}" max="{%=max%}" step="{%=step%}" class="form-range"
        data-input-value />
    <input name="{%=key%}" type="number" min="{%=min%}" max="{%=max%}" step="{%=step%}" class="form-control"
        data-input-value />
</div>

</script>

<script id="vvveb-input-imageinput" type="text/html">
<div>
    <input name="{%=key%}" type="text" class="form-control epbe-file-url-in" />
    <!-- <input name="file" type="file" class="form-control"/> -->
</div>
<button class="btn btn-primary edwiser-select-file" data-backdrop="false" data-toggle="modal"
    data-target="#edwiser-page-builder-fp">
    <i class="fa fa-file"></i> Choose File
</button>

</script>

<script id="vvveb-input-colorinput" type="text/html">
<div>
    <input name="{%=key%}" type="color" {% if (typeof value !== 'undefined' && value != false) { %} value="{%=value%}"
        {% } %} pattern="#[a-f0-9]{6}" class="form-control form-control-color" />
</div>

</script>

<script id="vvveb-input-bootstrap-color-picker-input" type="text/html">
<div>
    <div id="cp2" class="input-group" title="Using input value">
        <input name="{%=key%}" type="text" {% if (typeof value !== 'undefined' && value != false) { %}
            value="{%=value%}" {% } %} class="form-control" />
        <span class="input-group-append">
            <span class="input-group-text colorpicker-input-addon"><i></i></span>
        </span>
    </div>
</div>

</script>

<script id="vvveb-input-numberinput" type="text/html">
<div>
    <input name="{%=key%}" type="number" value="{%=value%}"
        {% if (typeof min !== 'undefined' && min != false) { %}min="{%=min%}" {% } %}
        {% if (typeof max !== 'undefined' && max != false) { %}max="{%=max%}" {% } %}
        {% if (typeof step !== 'undefined' && step != false) { %}step="{%=step%}" {% } %} class="form-control" />
</div>

</script>

<script id="vvveb-input-button" type="text/html">
<div>
    <button class="btn btn-sm btn-primary">
        <i class="fa  {% if (typeof icon !== 'undefined') { %} {%=icon%} {% } else { %} fa-plus {% } %}"></i> {%=text%}
    </button>
</div>

</script>
<script id="vvveb-input-linkbutton" type="text/html">
<div>
    <button
        class="btn btn-sm btn-outline-light {% if (typeof className !== 'undefined') { %} {%=className%} {% } else { %} text-danger {% } %}">
        <i class="fa  {% if (typeof icon !== 'undefined') { %} {%=icon%} {% } else { %} fa-trash {% } %}"></i> {%=text%}
    </button>
</div>

</script>

<script id="vvveb-input-cssunitinput" type="text/html">
<div class="input-group" id="cssunit-{%=key%}">
    <input name="number" type="number" {% if (typeof value !== 'undefined' && value != false) { %} value="{%=value%}"
        {% } %} {% if (typeof min !== 'undefined' && min != false) { %}min="{%=min%}" {% } %}
        {% if (typeof max !== 'undefined' && max != false) { %}max="{%=max%}" {% } %}
        {% if (typeof step !== 'undefined' && step != false) { %}step="{%=step%}" {% } %} class="form-control" />
    <div class="input-group-append">
        <select class="form-select small-arrow" name="unit">
            <option value="em">em</option>
            <option value="px">px</option>
            <option value="%">%</option>
            <option value="rem">rem</option>
            <option value="auto">auto</option>
        </select>
    </div>
</div>

</script>

<script id="vvveb-filemanager-folder" type="text/html">
<li data-folder="{%=folder%}" class="folder">
    <label for="{%=folder%}"><span>{%=folderTitle%}</span></label> <input type="checkbox" id="{%=folder%}" />
    <ol></ol>
</li>

</script>

<script id="vvveb-filemanager-page" type="text/html">
<li data-url="{%=url%}" data-file="{%=file%}" data-page="{%=name%}" class="file">
    <label for="{%=name%}" {% if (typeof description !== 'undefined') { %} title="{%=description%}" {% } %}>
        <span>{%=title%}</span>
    </label> <input type="checkbox" id="{%=name%}" />
    <ol></ol>
</li>

</script>

<script id="vvveb-filemanager-component" type="text/html">
<li data-url="{%=url%}" data-component="{%=name%}" class="component">
    <a href="{%=url%}"><span>{%=title%}</span></a>
</li>

</script>

<script id="vvveb-breadcrumb-navigaton-item" type="text/html">
<li class="breadcrumb-item"><a href="#">{%=name%}</a></li>

</script>

<script id="vvveb-input-sectioninput" type="text/html">
<label class="header" data-header="{%=key%}" for="header_{%=key%}"><span>{%=header%}</span>
    <div class="header-arrow fa fa-angle-down"></div>
</label>
<input class="header_check" type="checkbox" {% if (typeof expanded !== 'undefined' && expanded == false) { %}
    {% } else { %}checked="true" {% } %} id="header_{%=key%}">
<div class="section row m-0" data-section="{%=key%}"></div>

</script>


<script id="vvveb-property" type="text/html">
<div class="mb-3 {% if (typeof col !== 'undefined' && col != false) { %} col-sm-{%=col%} {% } else { %}row{% } %} {% if (typeof inline !== 'undefined' && inline == true) { %}inline{% } %} "
    data-key="{%=key%}" {% if (typeof group !== 'undefined' && group != null) { %}data-group="{%=group%}" {% } %}>
    {% if (typeof name !== 'undefined' && name != false) { %}<label
        class="{% if (typeof inline === 'undefined' ) { %}col-sm-4{% } %} form-label"
        for="input-model">{%=name%}</label>{% } %}
    <div
        class="{% if (typeof inline === 'undefined') { %}col-sm-{% if (typeof name !== 'undefined' && name != false) { %}8{% } else { %}12{% } } %} input">
    </div>
</div>

</script>

<script id="vvveb-input-autocompletelist" type="text/html">
<div>
    <input name="{%=key%}" type="text" class="form-control" />
    <div class="form-control autocomplete-list" style="min-height: 150px; overflow: auto;">
    </div>
</div>

</script>

<script id="vvveb-input-tagsinput" type="text/html">
<div>
    <div class="form-control tags-input" style="height:auto;">
        <input name="{%=key%}" type="text" class="form-control" style="border:none;min-width:60px;" />
    </div>
</div>

</script>

<script id="vvveb-input-noticeinput" type="text/html">
<div>
    <div class="alert alert-dismissible fade show alert-{%=type%}" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h6><b>{%=title%}</b></h6>
        {%=text%}
    </div>
</div>

</script>

<script id="vvveb-section" type="text/html">
{% var suffix = Math.floor(Math.random() * 10000); %}
<div class="section-item" draggable="true">
    <div class="controls">
        <div class="handle"></div>
        <div class="info">
            <div class="name">{%=name%}
                <div class="type">{%=type%}</div>
            </div>
        </div>
        <div class="buttons">
            <a class="delete-btn" href="" title="Remove section"><i class="fa fa-trash text-danger"></i></a>
            <a class="properties-btn" href="" title="Properties"><i class="fa fa-cog"></i></a>
        </div>
    </div>
    <input class="header_check" type="checkbox" id="section-components-{%=suffix%}">
    <label for="section-components-{%=suffix%}">
        <div class="header-arrow fa fa-angle-down"></div>
    </label>
    <div class="tree">
        <ol>
            <li data-component="Products" class="file">
                <label for="idNaN"
                    style="background-image:url(http://demo.givan.ro/js/vvvebjs/icons/products.svg)"><span>Products</span></label>
                <input type="checkbox" id="idNaN">
            </li>
            <li data-component="Posts" class="file">
                <label for="idNaN"
                    style="background-image:url(http://demo.givan.ro/js/vvvebjs/icons/posts.svg)"><span>Posts</span></label>
                <input type="checkbox" id="idNaN">
            </li>
        </ol>
    </div>
</div>

</script>

<script id="vvveb-input-layoutselector" type="text/html">
<div class="layoutselector">
    {% for ( var i = 0; i < options.length; i++ ) { %}
    <label class="epb-ly-sele" title="{%=options[i].title%}">
        <input name="{%=key%}" class="epb-ly-sele-input" type="radio" value="{%=options[i].value%}" id="{%=key%}{%=i%}"
            {%if (options[i].checked) { %}checked="{%=options[i].checked%}" {% } %}>
        <img class="epb-ly-sele-img" src="{%=options[i].img%}" alt='{%=options[i].text%}'>
    </label>

    {% } %}

</div>

</script>

<script id="vvveb-input-multiselect" type="text/html">
<div>
    <select multiple="multiple" class="form-select multiselect" id="{%=eleid%}">
        {% for ( var i = 0; i < options.length; i++ ) { %}
        <option value="{%=options[i].value%}">{%=options[i].text%}</option>
        {% } %}
    </select>
</div>
</script>

<!--// end templates -->

<!-- message modal-->
<div class="modal fade" id="message-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title text-primary"><i class="fa fa-comment"></i> VvvebJs</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- span aria-hidden="true"><small><i class="fa fa-times"></i></small></span -->
                </button>
            </div>
            <div class="modal-body">
                <p>Page was successfully saved!.</p>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-primary">Ok</button> -->
                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal"><i
                        class="fa fa-times"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<script src="js/beautify.min.js"></script>
<script src="js/beautify-css.min.js"></script>
<!-- <script src="js/beautify-html.min.js"></script> -->


<script src="js/popper.min.js"></script>
<script src="js/libs/builder/builder.js"></script>

<!-- code mirror - code editor syntax highlight -->
<link href="js/libs/codemirror/lib/codemirror.css" rel="stylesheet" />
<link href="js/libs/codemirror/theme/material.css" rel="stylesheet" />
<script src="js/libs/codemirror/lib/codemirror.js"></script>
<script src="js/libs/codemirror/lib/xml.js"></script>
<script src="js/libs/codemirror/lib/formatting.js"></script>
<script src="js/libs/builder/plugin-codemirror.js"></script>
