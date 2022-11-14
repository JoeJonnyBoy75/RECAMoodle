Vvveb.ComponentsGroup['Base'] =
    ['html/icon',/*"html/heading", "html/image", "html/hr", "html/form", "html/textinput", "html/textareainput", "html/selectinput", "html/fileinput", "html/checkbox", "html/radiobutton", */"html/link", "html/video",/* "html/button"*/];

Vvveb.Components.extend("_base", "html/icon", {
    classes: ["fa fa-plus p-3"],
    image: "icons/robot.png",
    html: '<i class="fa fa-plus p-3"></i>',
    name: "Icon",
    properties: [
        {
            name: "Background",
            key: "background",
            htmlAttr: "class",
            validValues: bgcolorClasses,
            inputtype: SelectInput,
            data: {
                options: bgcolorSelectOptions
            }
        },
        {
            name: "Background Color",
            key: "background-color",
            htmlAttr: "style",
            inputtype: ColorInput,
        },
        {
            name: "Text Color",
            key: "color",
            htmlAttr: "style",
            inputtype: ColorInput,
        }],
});

Vvveb.Components.extend("_base", "html/heading", {
    image: "icons/heading.svg",
    name: "Heading",
    nodes: ["h1", "h2", "h3", "h4", "h5", "h6"],
    html: "<h1>Heading</h1>",

    properties: [
        {
            name: "Size",
            key: "size",
            inputtype: SelectInput,

            onChange: function (node, value) {

                return changeNodeName(node, "h" + value);
            },

            init: function (node) {
                var regex;
                regex = /H(\d)/.exec(node.nodeName);
                if (regex && regex[1]) {
                    return regex[1]
                }
                return 1
            },

            data: {
                options: [{
                    value: "1",
                    text: "1"
                }, {
                    value: "2",
                    text: "2"
                }, {
                    value: "3",
                    text: "3"
                }, {
                    value: "4",
                    text: "4"
                }, {
                    value: "5",
                    text: "5"
                }, {
                    value: "6",
                    text: "6"
                }]
            },
        }]
});


Vvveb.Components.extend("_base", "html/link", {
    nodes: ["a"],
    name: "Link",
    html: '<a href="#" class="d-inline-block"><span>Link</span></a>',
    image: "icons/link.svg",
    properties: [{
        name: "Url",
        key: "href",
        htmlAttr: "href",
        inputtype: LinkInput
    }, {
        name: "Target",
        key: "target",
        htmlAttr: "target",
        inputtype: TextInput
    }]
});

Vvveb.Components.extend("_base", "html/image", {
    nodes: ["img"],
    name: "Image",
    html: '<img class="mw-100" src="' + Vvveb.baseUrl + 'icons/image.svg" height="auto" width="auto">',
    /*
    afterDrop: function (node)
    {
        node.attr("src", '');
        return node;
    },*/
    image: "icons/image.svg",
    resizable: true,//show select box resize handlers

    properties: [{
        name: "Image",
        key: "src",
        htmlAttr: "src",
        inputtype: ImageInput
    }, {
        name: "Width",
        key: "width",
        htmlAttr: "width",
        inputtype: TextInput
    }, {
        name: "Height",
        key: "height",
        htmlAttr: "height",
        inputtype: TextInput
    }, {
        name: "Alt",
        key: "alt",
        htmlAttr: "alt",
        inputtype: TextInput
    }]
});
Vvveb.Components.add("html/hr", {
    image: "icons/hr.svg",
    nodes: ["hr"],
    name: "Horizontal Rule",
    html: "<hr>"
});

Vvveb.Components.extend("_base", "html/label", {
    name: "Label",
    nodes: ["label"],
    html: '<label for="">Label</label>',
    properties: [{
        name: "For id",
        htmlAttr: "for",
        key: "for",
        inputtype: TextInput
    }]
});


Vvveb.Components.extend("_base", "html/textinput", {
    name: "Input",
    nodes: ["input"],
    //attributes: {"type":"text"},
    image: "icons/text_input.svg",
    html: '<div class="mb-3"><label>Text</label><input type="text" class="form-control"></div></div>',
    properties: [{
        name: "Value",
        key: "value",
        htmlAttr: "value",
        inputtype: TextInput
    }, {
        name: "Type",
        key: "type",
        htmlAttr: "type",
        inputtype: SelectInput,
        data: {
            options: [{
                value: "text",
                text: "text"
            }, {
                value: "button",
                text: "button"
            }, {
                value: "checkbox",
                text: "checkbox"
            }, {
                value: "color",
                text: "color"
            }, {
                value: "date",
                text: "date"
            }, {
                value: "datetime-local",
                text: "datetime-local"
            }, {
                value: "email",
                text: "email"
            }, {
                value: "file",
                text: "file"
            }, {
                value: "hidden",
                text: "hidden"
            }, {
                value: "image",
                text: "image"
            }, {
                value: "month",
                text: "month"
            }, {
                value: "number",
                text: "number"
            }, {
                value: "password",
                text: "password"
            }, {
                value: "radio",
                text: "radio"
            }, {
                value: "range",
                text: "range"
            }, {
                value: "reset",
                text: "reset"
            }, {
                value: "search",
                text: "search"
            }, {
                value: "submit",
                text: "submit"
            }, {
                value: "tel",
                text: "tel"
            }, {
                value: "text",
                text: "text"
            }, {
                value: "time",
                text: "time"
            }, {
                value: "url",
                text: "url"
            }, {
                value: "week",
                text: "week"
            }]
        }
    }, {
        name: "Placeholder",
        key: "placeholder",
        htmlAttr: "placeholder",
        inputtype: TextInput
    }, {
        name: "Disabled",
        key: "disabled",
        htmlAttr: "disabled",
        col: 6,
        inputtype: CheckboxInput,
    }, {
        name: "Required",
        key: "required",
        htmlAttr: "required",
        col: 6,
        inputtype: CheckboxInput,
    }]
});

Vvveb.Components.extend("_base", "html/selectinput", {
    nodes: ["select"],
    name: "Select Input",
    image: "icons/select_input.svg",
    html: '<div class="mb-3"><label>Choose an option </label><select class="form-control"><option value="value1">Text 1</option><option value="value2">Text 2</option><option value="value3">Text 3</option></select></div>',

    beforeInit: function (node) {
        properties = [];
        var i = 0;

        $(node).find('option').each(function () {

            data = { "value": this.value, "text": this.text };

            i++;
            properties.push({
                name: "Option " + i,
                key: "option" + i,
                //index: i - 1,
                optionNode: this,
                inputtype: TextValueInput,
                data: data,
                onChange: function (node, value, input) {

                    option = $(this.optionNode);

                    //if remove button is clicked remove option and render row properties
                    if (input.nodeName == 'BUTTON') {
                        option.remove();
                        Vvveb.Components.render("html/selectinput");
                        return node;
                    }

                    if (input.name == "value") option.attr("value", value);
                    else if (input.name == "text") option.text(value);

                    return node;
                },
            });
        });

        //remove all option properties
        this.properties = this.properties.filter(function (item) {
            return item.key.indexOf("option") === -1;
        });

        //add remaining properties to generated column properties
        properties.push(this.properties[0]);

        this.properties = properties;
        return node;
    },

    properties: [{
        name: "Option",
        key: "option1",
        inputtype: TextValueInput
    }, {
        name: "Option",
        key: "option2",
        inputtype: TextValueInput
    }, {
        name: "",
        key: "addChild",
        inputtype: ButtonInput,
        data: { text: "Add option", icon: "fa-plus" },
        onChange: function (node) {
            $(node).append('<option value="value">Text</option>');

            //render component properties again to include the new column inputs
            Vvveb.Components.render("html/selectinput");

            return node;
        }
    }]
});

Vvveb.Components.extend("_base", "html/textareainput", {
    name: "Text Area",
    image: "icons/text_area.svg",
    html: '<div class="mb-3"><label>Your response:</label><textarea class="form-control"></textarea></div>'
});
Vvveb.Components.extend("_base", "html/radiobutton", {
    name: "Radio Button",
    attributes: { "type": "radio" },
    image: "icons/radio.svg",
    html: '<label class="radio"><input type="radio"> Radio</label>',
    properties: [{
        name: "Name",
        key: "name",
        htmlAttr: "name",
        inputtype: TextInput
    }]
});
Vvveb.Components.extend("_base", "html/checkbox", {
    name: "Checkbox",
    attributes: { "type": "checkbox" },
    image: "icons/checkbox.svg",
    html: '<label class="checkbox"><input type="checkbox"> Checkbox</label>',
    properties: [{
        name: "Name",
        key: "name",
        htmlAttr: "name",
        inputtype: TextInput
    }]
});
Vvveb.Components.extend("_base", "html/fileinput", {
    name: "Input group",
    attributes: { "type": "file" },
    image: "icons/text_input.svg",
    html: '<div class="mb-3">\
			  <input type="file" class="form-control">\
			</div>'
});

Vvveb.Components.extend("_base", "html/video", {
    name: "Embeded Video",
    image: "icons/video.svg",
    html: '<div data-component-video style="position:relative; min-width:340px;min-height:340px;max-width:100%;"><iframe frameborder="0" allow="autoplay;controls;loop;mute;" src="https://www.youtube.com/embed/07m_bT5_OrU?autoplay=0&controls=0&loop=0&mute=0" style="width:100%;height:100%;position: relative;" class="videocomponent-iframe"></iframe></div>',
    nodes: ["iframe"],
    classes: [],
    video_src: '',
    video_id: '',
    autoplay: false,
    controls: false,
    loop: false,
    mute: false,
    attributes: ["data-component-video"],
    init: function (node) {
        iframe = jQuery('iframe', node);

        var video_url = iframe.attr("src");
        var video_data = video_url.split('?');
        this.video_src = video_data[0];

        //  if Youtube video link 
        if (this.video_src.indexOf("youtube") != -1) {
            this.video_id = this.video_src.match(/youtube.com\/embed\/([^$\?]*)/)[1];
        } else if (this.video_src.indexOf("vimeo") != -1) {
            this.video_id = this.video_src.match(/vimeo.com\/video\/([^$\?]*)/)[1]
        }

        var params_arr = video_data[1].split('&');

        var init = [];

        for (let i = 0; i < params_arr.length; i++) {
            let pair = params_arr[i].split('=');

            switch (pair[0]) {
                case "autoplay":
                    this.autoplay = pair[1];
                break;
                case "controls":
                    this.controls = pair[1];
                break;
                case "loop":
                    this.loop = pair[1];
                break;
                case "mute": // Keep this case for youtube.
                    this.mute = pair[1];
                break;
                case "muted": // Keep this case for vimeo.
                    this.mute = pair[1];
                break;
                case "playlist":
                    this.video_id = pair[1];
                default: break;
            }
        }

        $("#right-panel input[name=video_src]").val(this.video_src);
    },
    onChange: function (node, property, value) {
        frame = jQuery('iframe', node);

        switch (property['key']) {
            case "video_src":
                this.video_src = value;
                if (this.video_src.indexOf("youtube") != -1) {
                    this.video_id = this.video_src.match(/youtube.com\/embed\/([^$\?]*)/)[1];
                } else {
                    this.video_id = "";
                }
            break;
            case "autoplay":
                this.autoplay = value;
            break;
            case "controls":
                this.controls = value;
            break;
            case "loop":
                this.loop = value;
            break;
            case "mute": 
                this.mute = value;
            break;

            default: break;
        }
        
        var attributes = [];
        attributes.push((this.autoplay == true || this.autoplay == "true") ? "autoplay=1" : "autoplay=0");
        attributes.push((this.controls == true || this.controls == "true") ? "controls=1" : "controls=0");
        
        var mutetext = (this.video_src.indexOf("vimeo") != -1) ? "muted" : "mute";
        console.log("Mute value");
        console.log(this.mute);
        attributes.push((this.mute == true || this.mute == "true") ? `${mutetext}=1` : `${mutetext}=0`);

        attributes.push((this.loop == true || this.loop == "true") ? "loop=1" : "loop=0");
        if ((this.loop == true || this.loop == "true") && this.video_id != "") {
            attributes.push("playlist=" + this.video_id); 
        }

        attributes = "?" + attributes.join("&");
        frame.attr('src', this.video_src + attributes);
    },
    properties: [{
        name: "Embeded Source URL",
        key: "video_src",
        htmlAttr: "video_src",
        inputtype: LinkInput
    },
    {
        name: "Autoplay",
        key: "autoplay",
        inputtype: CheckboxInput,
        data: {
            on: "true",
            off: "false"
        },
        htmlAttr: "autoplay"
    }, {
        name: "Controls",
        key: "controls",
        inputtype: CheckboxInput,
        data: {
            on: "true",
            off: "false"
        },
        htmlAttr: "controls"
    }, {
        name: "Loop",
        key: "loop",
        inputtype: CheckboxInput,
        data: {
            on: "true",
            off: "false"
        },
        htmlAttr: "loop"
    },
    {
        name: "Mute",
        key: "mute",
        inputtype: CheckboxInput,
        data: {
            on: "true",
            off: "false"
        },
        htmlAttr:"mute"
    }]
});

Vvveb.Components.extend("_base", "html/button", {
    nodes: ["button"],
    name: "Html Button",
    image: "icons/button.svg",
    html: '<button>Button</button>',
    properties: [{
        name: "Text",
        key: "text",
        htmlAttr: "innerHTML",
        inputtype: TextInput
    }, {
        name: "Name",
        key: "name",
        htmlAttr: "name",
        inputtype: TextInput
    }, {
        name: "Type",
        key: "type",
        htmlAttr: "type",
        inputtype: SelectInput,
        data: {
            options: [{
                value: "button",
                text: "button"
            }, {
                value: "reset",
                text: "reset"
            }, {
                value: "submit",
                text: "submit"
            }],
        }
    }, {
        name: "Autofocus",
        key: "autofocus",
        htmlAttr: "autofocus",
        inputtype: CheckboxInput,
        inline: true,
        col: 6,
    }, {
        name: "Disabled",
        key: "disabled",
        htmlAttr: "disabled",
        inputtype: CheckboxInput,
        inline: true,
        col: 6,
    }]
});
