/*
Copyright 2017 Ziadin Givan

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

   http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.

https://github.com/givanz/Vvvebjs
*/
define('local_edwiserpagebuilder/components-edwiser', ['jquery', 'core/ajax'], function (jQuery, Ajax) {

    function addBlocks(blocks, edwiserfrompreview) {
        Vvveb.ComponentsGroup['Edwiser Functional Blocks'] = blocks;
        
        Vvveb.Components.extend("_base", "html/edwiserform", {
            name: "Edwiser Form",
            image: "icons/form.svg",
            classes: ['edwiser-pb-form-wrap'],
            html: `<div class="edwiser-pb-form-wrap" data-edwiser-dynamic="" data-shortcode="edwiser-form" data-formid="0" data-vvveb-disabled-area="">Form Content</div>`,
            beforeInit: function (node) {
                properties = this.properties[0];
                formoptions = [];
                Ajax.call([{
                    methodname: 'edwiserform_get_forms',
                    args: {
                        search: "",
                        start: 0,
                        length: 0,
                        order: { 'column': 0, 'dir': "" }
                    }
                }])[0].done(function (responce) {
                    $.each(responce.data, function (index, formdata) {
                        id = formdata.shortcode.replace('[edwiser-form id="', '').replace('"]', '');
                        if (!$.inArray(id, properties.validValues)) {
                            properties.validValues.push(id);
                        }
                        formoptions.push({ value: id, text: formdata.title });
                    });
                    this.properties.inputtype.updateOptions(formoptions);
                });
                this.properties[0].inputtype.updateOptions(formoptions);
                return node;
            },
            properties: [
                {
                    name: "Select Form",
                    key: "formid",
                    attributes: ['data-formid'],
                    htmlAttr: 'data-formid',
                    inputtype: SelectInput,
                    validValues: [0],
                    data: { options: [{ value: 0, text: "Select Form" }] },
                    onChange: function (node, value, input) {
                        Ajax.call([{
                            methodname: 'local_edwiserpagebuilder_get_shortcode_parsered_html',
                            args: {
                                shortcode: `[edwiser-form id='${value}']`,
                            }
                        }])[0].done(function (responce) {
                            $(node).empty();
                            $(node).append(responce);
                            edwiserfrompreview.render_form(node);
                        });
                        return node;
                    }
                }
            ]
        });

        Vvveb.Components.extend("_base", "html/modal", {
            name: "Modal",
            attributes: ['data-ebpb-dialog'],
            image: "icons/modal.svg",
            classes: ['edwiser-pb-dialog'],
            html: (()=> {
                return '<div class="edwiser-pb-dialog" data-ebpb-dialog><button type="button" class="btn btn-primary ebbp-mdl-trigger" data-toggle="modal" data-target="#epb-modal-[[int]]-[[inst]]">Launch modal</button><div class="modal fade" id="epb-modal-[[int]]-[[inst]]" tabindex="-1" role="dialog" aria-labelledby="epb-modal-[[int]]-[[inst]] Title" aria-hidden="true"><div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="epb-modal-title-[[int]]-[[inst]]">Modal title</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">...</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><button type="button" class="btn btn-primary">Save changes</button></div></div></div></div></div><script>var modaltrigger = document.querySelector("section.page-aside .block-content .edwiser-pb-dialog .ebbp-mdl-trigger");modaltrigger.addEventListener("click",function(e){var bodyEle = document.querySelector("body");var modalEle = document.querySelector("section.page-aside .block-content .edwiser-pb-dialog .modal.fade");if (modalEle) {bodyEle.append(modalEle.parentElement.removeChild(modalEle));}},false);</script>';
            })(),
            beforeInit: function (node) {
                var id = Math.floor(Math.random() * (30 - 1) + 1);
                node.innerHTML = node.innerHTML.replaceAll("[[int]]", id);
                return node;
            },
            properties: [

                {
                    name: "Show Modal Content",
                    key: "showmodal",
                    htmlAttr: "class",
                    child: ".modal",
                    validValues: ["", "ebpb-show-edit"],
                    inputtype: ToggleInput,
                    data: {
                        on: "ebpb-show-edit",
                        off: ""
                    }
                },
                {
                    name: "Target",
                    key: "target",
                    htmlAttr: "data-target",
                    child: '.ebbp-mdl-trigger',
                    inputtype: TextInput,
                    onChange: function (node, value, input) {
                        if (value.charAt(0) === '#') {
                            value = value.substring(1);
                        }
                        $(node).parent().find('.modal').attr('id', value);
                        return node;
                    }
                }
            ]
        });
        var courseProperty1;
        var courseProperty2;
        Vvveb.Components.extend("_base", "html/courses", {
            name: "Courses",
            image: "icons/courses.png",
            classes: ['edwiser-courses'],
            html: `<div class="edwiser-courses" data-edwiser-dynamic data-shortcode="edwiser-courses" data-vvveb-disabled-area data-catid="0" data-layout="cldefault">[edwiser-courses catid="all" layout="cldefault"]</div>`,
            beforeInit: function (node) {
                var catid = $(node).attr('data-catid');
                var layoutid = $(node).attr('data-layout');

                property1 = courseProperty1 = this.properties[0];
                property2 = courseProperty2 = this.properties[1];
                catoptions = [];
                layouts = [];
                var promises = Ajax.call([
                    {
                        methodname: 'local_edwiserpagebuilder_course_get_categories',
                        args: {}
                    },
                    {
                        methodname: 'local_edwiserpagebuilder_get_cards_list',
                        args: { belongsto: "courses" }
                    }
                ]);

                promises[0].done(function (response) {
                    catid = catid.split(",");
                    $.each(response, function (index, data) {
                        if (!$.inArray(data.id, property1.validValues)) {
                            property1.validValues.push(data.id);
                        }
                        var checked = false;
                        if (catid.includes("all")) {
                            $('#catselector option[value="0"]').attr("selected", true);
                        }
                        checked = (catid.includes(""+data.id))? true: false;
                        catoptions.push({ value: data.id, text: data.name, checked:checked });
                    });
                    this.property1.inputtype.updateOptions(catoptions);
                }).fail(function (ex) {
                    // do something with the exception
                });

                promises[1].done(function (response) {
                    $.each(response, function (index, data) {
                        if (!$.inArray(data.id, property2.validValues)) {
                            property2.validValues.push(data.id);
                        }
                        var checked = (layoutid == data.id || layoutid == data.title)? true: false;

                        layouts.push(
                            {
                                value: data.id,
                                img: data.thumbnail,
                                text: "",
                                title: data.title,
                                checked: checked,
                            }
                        );
                    });

                    this.property2.inputtype.updateOptions(layouts);

                }).fail(function (ex) {
                    // do something with the exception
                });
                var shortcode = `[edwiser-courses catid='${catid}' layout='${layoutid}']`;
                return updateCardView(shortcode, node);
            },
            properties: [
                {
                    name: "Select Category",
                    key: "catid",
                    inputtype: MultiSelectInput,
                    validValues: [],
                    data: { eleid: "catselector", options: [{ value: 0, text: "All", checked: true }] },
                    onChange: function (node, value, input) {
                        var selected = $("#catselector").val();
                        $(node).attr('data-catid', selected);
                        var layoutid = $(node).attr('data-layout');
                        var shortcode = `[edwiser-courses catid='${selected}' layout='${layoutid}']`;
                        return updateCardView(shortcode, node);
                    }
                },
                {
                    name: 'Select layout',
                    key: 'selcourselayout',
                    inputtype: LayoutSelectorInput,
                    validValues: [],
                    data: {
                        extraclass: '',
                        options: []
                    },
                    onChange: function (node, value, input) {
                        var layoutid = value;
                        $(node).attr('data-layout', layoutid);
                        var catid = $(node).attr('data-catid');
                        var shortcode = `[edwiser-courses catid='${catid}' layout='${layoutid}']`;
                        return updateCardView(shortcode, node);
                    }
                },
                {
                    name: "Update Layouts",
                    key: "updateLayouts",
                    inputtype: LinkButton,
                    data: { text: "Update Layouts", icon: "fa fa-refresh", className: "text-primary refresh-layout" },
                    onChange: function (node) {
                        updateLayouts(courseProperty2, "courses", node);
                        var catid = $(node).attr('data-catid');
                        var layoutid = $(node).attr('data-layout');
                        var shortcode = `[edwiser-courses catid='${catid}' layout='${layoutid}']`;
                        return updateCardView(shortcode, node);
                    }
                }
            ]
        });
        var categoryProperty1;
        Vvveb.Components.extend("_base", "html/categories", {
            name: "Categories",
            image: "icons/categories.svg",
            classes: ['edwiser-categories'],
            html: `<div class="edwiser-categories" data-edwiser-dynamic data-shortcode="edwiser-categories" data-vvveb-disabled-area data-layout="clcategory" data-btnlabel="Explore" data-count="on">[edwiser-categories layout="clcategory" btnlabel="Explore" count="on"]</div>`,
            beforeInit: function (node) {
                var layoutid = $(node).attr('data-layout');
                var btnlabel = $(node).attr('data-btnlabel');
                var count = $(node).attr('data-count');

                property1 = categoryProperty1 = this.properties[0];

                // Little hack to show the default value for toggle switch
                if (count == "on") {
                    setTimeout(function() {
                      $('.toggle input[type="checkbox"]').click();
                    }, 10);
                    
                }

                catoptions = [];
                layouts = [];
                var promises = Ajax.call([
                    {
                        methodname: 'local_edwiserpagebuilder_get_cards_list',
                        args: { belongsto: "categories" }
                    }
                ]);

                promises[0].done(function (response) {
                    $.each(response, function (index, data) {
                        if (!$.inArray(data.id, property1.validValues)) {
                            property1.validValues.push(data.id);
                        }
                        
                        var checked = (layoutid == data.id || layoutid == data.title)? true: false;
                        layouts.push(
                            {
                                value: data.id,
                                img: data.thumbnail,
                                text: "",
                                title: data.title,
                                checked: checked,
                            }
                        );
                    });
                    this.property1.inputtype.updateOptions(layouts);
                }).fail(function (ex) {
                    // do something with the exception
                });

                var shortcode = `[edwiser-categories layout='${layoutid}' btnlabel='${btnlabel}' count='${count}']`;
                return updateCardView(shortcode, node);
            },
            properties: [
                {
                    name: 'Select layout',
                    key: 'selcourselayout',
                    inputtype: LayoutSelectorInput,
                    validValues: [],
                    data: {
                        extraclass: '',
                        options: []
                    },
                    onChange: function (node, value, input) {
                        $(node).attr('data-layout', value);

                        var btnlabel = $(node).attr('data-btnlabel');
                        var count = $(node).attr('data-count');
                        var shortcode = `[edwiser-categories layout='${value}' btnlabel='${btnlabel}' count='${count}']`;
                        return updateCardView(shortcode, node);
                    }
                },
                {
                    name: "Update Layouts",
                    key: "updateLayouts",
                    inputtype: LinkButton,
                    data: { text: "Update Layouts", icon: "fa fa-refresh", className: "text-primary refresh-layout" },
                    onChange: function (node) {
                        updateLayouts(categoryProperty1, "categories", node);
                        var layoutid = $(node).attr('data-layout');
                        var btnlabel = $(node).attr('data-btnlabel');
                        var count = $(node).attr('data-count');
                        var shortcode = `[edwiser-categories layout='${layoutid}' btnlabel='${btnlabel}' count='${count}']`;
                        return updateCardView(shortcode, node);
                    }
                },
                {
                    name: "Button Label",
                    key: "buttonlabel",
                    htmlAttr: "data-btnlabel",
                    inputtype: TextInput,
                    onChange: function (node, value, input) {
                        var layoutid = $(node).attr('data-layout');
                        var count = $(node).attr('data-count');
                        var shortcode = `[edwiser-categories layout='${layoutid}' btnlabel='${value}' count='${count}']`;
                        return updateCardView(shortcode, node);
                        // return node;
                    }
                },
                {
                    name: "Show Course Count",
                    key: "showcount",
                    attributes: ['data-count'],
                    htmlAttr: "data-count",
                    inputtype: ToggleInput,
                    validValues: ["on", "off"],
                    data: {
                        on: "on",
                        off: "off"
                    },
                    onChange: function (node, value, input) {
                        var layoutid = $(node).attr('data-layout');
                        var btnlabel = $(node).attr('data-btnlabel');
                        if (btnlabel == "") {
                            btnlabel = "Show Courses";
                        }
                        var shortcode = `[edwiser-categories layout='${layoutid}' btnlabel='${btnlabel}' count='${value}']`;
                        return updateCardView(shortcode, node);
                        return node;
                    }
                }
            ]
        });
    }

    function updateCardView(shortcode, node) {
        
        Ajax.call([{
            methodname: 'local_edwiserpagebuilder_get_shortcode_parsered_html',
            args: {
                shortcode: shortcode,
            }
        }])[0].done(function (response) {
            $(node).empty();
            $(node).append(response);
            // edwiserfrompreview.render_form(node);
        });
        return node;
    }

    function updateLayouts(selectedProperty, belongsto, node) {
        if (confirm("Updating the content of layouts which will affect every new and existing added component. Confirm?")) {
            var layoutid = $(node).attr('data-layout');
            Ajax.call([{
                methodname: 'local_edwiserpagebuilder_get_cards_list',
                args: {belongsto: belongsto, updatefirst: true}
            }])[0].done(function (response) {
                    
                selectedProperty.validValues = [];
                selectedProperty.inputtype.emptyOptions();

                layouts = [];
                $.each(response, function (index, data) {

                    if (!$.inArray(data.id, selectedProperty.validValues)) {
                        selectedProperty.validValues.push(data.id);
                    }
                    var checked = (layoutid == data.id)? true: false;

                    layouts.push(
                        {
                            value: data.id,
                            img: data.thumbnail,
                            text: "",
                            title: "",
                            checked: checked,
                        }
                    );
                });
                selectedProperty.inputtype.updateOptions(layouts);
            });   
        }
    }

    return {
        init: function (formavailable) {
            if (formavailable) {
                require(['local_edwiserpagebuilder/edwiserfrompreview'], function(edwiserfrompreview){
                    var blocks = ["html/modal", "html/courses", "html/categories", "html/edwiserform"];
                    addBlocks(blocks, edwiserfrompreview);
                });
            } else {
                var blocks = ["html/modal", "html/courses", "html/categories"];
                addBlocks(blocks);
            }
        }
    }

});
