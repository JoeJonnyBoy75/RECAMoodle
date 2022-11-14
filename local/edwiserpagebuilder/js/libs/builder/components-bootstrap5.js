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

Vvveb.ComponentsGroup['Bootstrap 5'] =
    ["html/container", "html/gridrow", "html/btn", "html/buttongroup", "html/heading", "html/image", "html/alert", "html/card", "html/listgroup", "html/hr", "html/badge", "html/table", "html/paragraph", "html/spacer", "html/carousel" /*"html/progress", "html/navbar", "html/breadcrumbs", "html/pagination", "html/form", "html/buttontoolbar"*/];


Vvveb.Components.extend("_base", "html/container", {
    classes: ["container", "container-fluid"],
    image: "icons/container.svg",
    html: '<div class="container" style="min-height:150px;"><div class="m-5">Container</div></div>',
    name: "Container",
    properties: [
        {
            name: "Type",
            key: "type",
            htmlAttr: "class",
            inputtype: SelectInput,
            validValues: ["container", "container-fluid"],
            data: {
                options: [{
                    value: "container",
                    text: "Default"
                }, {
                    value: "container-fluid",
                    text: "Fluid"
                }]
            }
        },
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
Vvveb.Components.extend("_base", "html/btn", {
    classes: ["btn", "btn-link"],
    name: "Button",
    image: "icons/button.svg",
    html: '<a role="button" class="btn btn-primary" href="#">Primary</a>',
    properties: [{
        name: "Link To",
        key: "href",
        htmlAttr: "href",
        inputtype: LinkInput
    }, {
        name: "Type",
        key: "type",
        htmlAttr: "class",
        inputtype: SelectInput,
        validValues: ["btn-default", "btn-primary", "btn-info", "btn-success", "btn-warning", "btn-info", "btn-light", "btn-dark", "btn-outline-primary", "btn-outline-info", "btn-outline-success", "btn-outline-warning", "btn-outline-info", "btn-outline-light", "btn-outline-dark", "btn-link"],
        data: {
            options: [{
                value: "btn-default",
                text: "Default"
            }, {
                value: "btn-primary",
                text: "Primary"
            }, {
                value: "btn btn-info",
                text: "Info"
            }, {
                value: "btn-success",
                text: "Success"
            }, {
                value: "btn-warning",
                text: "Warning"
            }, {
                value: "btn-info",
                text: "Info"
            }, {
                value: "btn-light",
                text: "Light"
            }, {
                value: "btn-dark",
                text: "Dark"
            }, {
                value: "btn-outline-primary",
                text: "Primary outline"
            }, {
                value: "btn btn-outline-info",
                text: "Info outline"
            }, {
                value: "btn-outline-success",
                text: "Success outline"
            }, {
                value: "btn-outline-warning",
                text: "Warning outline"
            }, {
                value: "btn-outline-info",
                text: "Info outline"
            }, {
                value: "btn-outline-light",
                text: "Light outline"
            }, {
                value: "btn-outline-dark",
                text: "Dark outline"
            }, {
                value: "btn-link",
                text: "Link"
            }]
        }
    }, {
        name: "Size",
        key: "size",
        htmlAttr: "class",
        inputtype: SelectInput,
        validValues: ["btn-lg", "btn-sm"],
        data: {
            options: [{
                value: "",
                text: "Default"
            }, {
                value: "btn-lg",
                text: "Large"
            }, {
                value: "btn-sm",
                text: "Small"
            }]
        }
    }, {
        name: "Target",
        key: "target",
        htmlAttr: "target",
        inputtype: TextInput
    }, {
        name: "Disabled",
        key: "disabled",
        htmlAttr: "class",
        inputtype: ToggleInput,
        validValues: ["disabled"],
        data: {
            on: "disabled",
            off: null
        }
    }]
});
Vvveb.Components.extend("_base", "html/buttongroup", {
    classes: ["btn-group"],
    name: "Button Group",
    image: "icons/button_group.svg",
    html: '<div class="btn-group" role="group" aria-label="Basic example"><button type="button" class="btn btn-secondary">Left</button><button type="button" class="btn btn-secondary">Middle</button> <button type="button" class="btn btn-secondary">Right</button></div>',
    properties: [{
        name: "Size",
        key: "size",
        htmlAttr: "class",
        inputtype: SelectInput,
        validValues: ["btn-group-lg", "btn-group-sm"],
        data: {
            options: [{
                value: "",
                text: "Default"
            }, {
                value: "btn-group-lg",
                text: "Large"
            }, {
                value: "btn-group-sm",
                text: "Small"
            }]
        }
    }, {
        name: "Alignment",
        key: "alignment",
        htmlAttr: "class",
        inputtype: SelectInput,
        validValues: ["btn-group", "btn-group-vertical"],
        data: {
            options: [{
                value: "",
                text: "Default"
            }, {
                value: "btn-group",
                text: "Horizontal"
            }, {
                value: "btn-group-vertical",
                text: "Vertical"
            }]
        }
    }]
});
Vvveb.Components.extend("_base", "html/buttontoolbar", {
    classes: ["btn-toolbar"],
    name: "Button Toolbar",
    image: "icons/button_toolbar.svg",
    html: '<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">\
		  <div class="btn-group me-2" role="group" aria-label="First group">\
			<button type="button" class="btn btn-secondary">1</button>\
			<button type="button" class="btn btn-secondary">2</button>\
			<button type="button" class="btn btn-secondary">3</button>\
			<button type="button" class="btn btn-secondary">4</button>\
		  </div>\
		  <div class="btn-group me-2" role="group" aria-label="Second group">\
			<button type="button" class="btn btn-secondary">5</button>\
			<button type="button" class="btn btn-secondary">6</button>\
			<button type="button" class="btn btn-secondary">7</button>\
		  </div>\
		  <div class="btn-group" role="group" aria-label="Third group">\
			<button type="button" class="btn btn-secondary">8</button>\
		  </div>\
		</div>'
});
Vvveb.Components.extend("_base", "html/alert", {
    classes: ["alert"],
    name: "Alert",
    image: "icons/alert.svg",
    html: '<div class="alert alert-warning alert-dismissible fade show" role="alert">\
		  <strong>Holy guacamole!</strong> You should check in on some of those fields below.\
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
			<span aria-hidden="true">&times;</span>\
		  </button>\
		</div>',
    properties: [{
        name: "Type",
        key: "type",
        htmlAttr: "class",
        validValues: ["alert-primary", "alert-secondary", "alert-success", "alert-danger", "alert-warning", "alert-info", "alert-light", "alert-dark"],
        inputtype: SelectInput,
        data: {
            options: [{
                value: "alert-primary",
                text: "Default"
            }, {
                value: "alert-secondary",
                text: "Secondary"
            }, {
                value: "alert-success",
                text: "Success"
            }, {
                value: "alert-danger",
                text: "Danger"
            }, {
                value: "alert-warning",
                text: "Warning"
            }, {
                value: "alert-info",
                text: "Info"
            }, {
                value: "alert-light",
                text: "Light"
            }, {
                value: "alert-dark",
                text: "Dark"
            }]
        }
    }]
});
Vvveb.Components.extend("_base", "html/badge", {
    classes: ["badge"],
    image: "icons/badge.svg",
    name: "Badge",
    html: '<span class="badge bg-primary">Primary badge</span>',
    properties: [{
        name: "Color",
        key: "color",
        htmlAttr: "class",
        validValues: ["bg-primary", "bg-secondary", "bg-success", "bg-danger", "bg-warning", "bg-info", "bg-light", "bg-dark"],
        inputtype: SelectInput,
        data: {
            options: [{
                value: "",
                text: "Default"
            }, {
                value: "bg-primary",
                text: "Primary"
            }, {
                value: "bg-secondary",
                text: "Secondary"
            }, {
                value: "bg-success",
                text: "Success"
            }, {
                value: "bg-warning",
                text: "Warning"
            }, {
                value: "bg-danger",
                text: "Danger"
            }, {
                value: "bg-info",
                text: "Info"
            }, {
                value: "bg-light",
                text: "Light"
            }, {
                value: "bg-dark",
                text: "Dark"
            }]
        }
    }]
});
Vvveb.Components.extend("_base", "html/card", {
    classes: ["card"],
    image: "icons/panel.svg",
    name: "Card",
    html: '<div class="card">\
		  <img class="card-img-top" src="../../local/edwiserpagebuilder/js/libs/builder/icons/image.svg" alt="Card image cap" width="128" height="128">\
		  <div class="card-body">\
			<h4 class="card-title">Card title</h4>\
			<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>\
			<a href="#" class="btn btn-primary">Go somewhere</a>\
		  </div>\
		</div>'
});
Vvveb.Components.extend("_base", "html/listgroup", {
    name: "List Group",
    image: "icons/list_group.svg",
    classes: ["list-group"],
    html: '<ul class="list-group">\n  <li class="list-group-item">\n    <span class="badge">14</span>\n    Cras justo odio\n  </li>\n  <li class="list-group-item">\n    <span class="badge">2</span>\n    Dapibus ac facilisis in\n  </li>\n  <li class="list-group-item">\n    <span class="badge">1</span>\n    Morbi leo risus\n  </li>\n</ul>'
});
Vvveb.Components.extend("_base", "html/listitem", {
    name: "List Item",
    classes: ["list-group-item"],
    html: '<li class="list-group-item"><span class="badge">14</span> Cras justo odio</li>'
});
Vvveb.Components.extend("_base", "html/breadcrumbs", {
    classes: ["breadcrumb"],
    name: "Breadcrumbs",
    image: "icons/breadcrumbs.svg",
    html: '<ol class="breadcrumb">\
		  <li class="breadcrumb-item active"><a href="#">Home</a></li>\
		  <li class="breadcrumb-item active"><a href="#">Library</a></li>\
		  <li class="breadcrumb-item active">Data 3</li>\
		</ol>'
});
Vvveb.Components.extend("_base", "html/breadcrumbitem", {
    classes: ["breadcrumb-item"],
    name: "Breadcrumb Item",
    html: '<li class="breadcrumb-item"><a href="#">Library</a></li>',
    properties: [{
        name: "Active",
        key: "active",
        htmlAttr: "class",
        validValues: ["", "active"],
        inputtype: ToggleInput,
        data: {
            on: "active",
            off: ""
        }
    }]
});
Vvveb.Components.extend("_base", "html/pagination", {
    classes: ["pagination"],
    name: "Pagination",
    image: "icons/pagination.svg",
    html: '<nav aria-label="Page navigation example">\
	  <ul class="pagination">\
		<li class="page-item"><a class="page-link" href="#">Previous</a></li>\
		<li class="page-item"><a class="page-link" href="#">1</a></li>\
		<li class="page-item"><a class="page-link" href="#">2</a></li>\
		<li class="page-item"><a class="page-link" href="#">3</a></li>\
		<li class="page-item"><a class="page-link" href="#">Next</a></li>\
	  </ul>\
	</nav>',

    properties: [{
        name: "Size",
        key: "size",
        htmlAttr: "class",
        inputtype: SelectInput,
        validValues: ["btn-lg", "btn-sm"],
        data: {
            options: [{
                value: "",
                text: "Default"
            }, {
                value: "btn-lg",
                text: "Large"
            }, {
                value: "btn-sm",
                text: "Small"
            }]
        }
    }, {
        name: "Alignment",
        key: "alignment",
        htmlAttr: "class",
        inputtype: SelectInput,
        validValues: ["justify-content-center", "justify-content-end"],
        data: {
            options: [{
                value: "",
                text: "Default"
            }, {
                value: "justify-content-center",
                text: "Center"
            }, {
                value: "justify-content-end",
                text: "Right"
            }]
        }
    }]
});
Vvveb.Components.extend("_base", "html/pageitem", {
    classes: ["page-item"],
    html: '<li class="page-item"><a class="page-link" href="#">1</a></li>',
    name: "Pagination Item",
    properties: [{
        name: "Link To",
        key: "href",
        htmlAttr: "href",
        child: ".page-link",
        inputtype: TextInput
    }, {
        name: "Disabled",
        key: "disabled",
        htmlAttr: "class",
        validValues: ["disabled"],
        inputtype: ToggleInput,
        data: {
            on: "disabled",
            off: ""
        }
    }]
});
Vvveb.Components.extend("_base", "html/progress", {
    classes: ["progress"],
    name: "Progress Bar",
    image: "icons/progressbar.svg",
    html: '<div class="progress"><div class="progress-bar w-25"></div></div>',
    properties: [{
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
        name: "Progress",
        key: "background",
        child: ".progress-bar",
        htmlAttr: "class",
        validValues: ["", "w-25", "w-50", "w-75", "w-100"],
        inputtype: SelectInput,
        data: {
            options: [{
                value: "",
                text: "None"
            }, {
                value: "w-25",
                text: "25%"
            }, {
                value: "w-50",
                text: "50%"
            }, {
                value: "w-75",
                text: "75%"
            }, {
                value: "w-100",
                text: "100%"
            }]
        }
    },
    {
        name: "Progress background",
        key: "background",
        child: ".progress-bar",
        htmlAttr: "class",
        validValues: bgcolorClasses,
        inputtype: SelectInput,
        data: {
            options: bgcolorSelectOptions
        }
    }, {
        name: "Striped",
        key: "striped",
        child: ".progress-bar",
        htmlAttr: "class",
        validValues: ["", "progress-bar-striped"],
        inputtype: ToggleInput,
        data: {
            on: "progress-bar-striped",
            off: "",
        }
    }, {
        name: "Animated",
        key: "animated",
        child: ".progress-bar",
        htmlAttr: "class",
        validValues: ["", "progress-bar-animated"],
        inputtype: ToggleInput,
        data: {
            on: "progress-bar-animated",
            off: "",
        }
    }]
});
Vvveb.Components.extend("_base", "html/navbar", {
    classes: ["navbar"],
    image: "icons/navbar.svg",
    name: "Nav Bar",
    html: '<nav class="navbar navbar-expand-lg navbar-light bg-light">\
		  <a class="navbar-brand" href="#">Navbar</a>\
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">\
			<span class="navbar-toggler-icon"></span>\
		  </button>\
		\
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">\
			<ul class="navbar-nav me-auto">\
			  <li class="nav-item active">\
				<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>\
			  </li>\
			  <li class="nav-item">\
				<a class="nav-link" href="#">Link</a>\
			  </li>\
			  <li class="nav-item">\
				<a class="nav-link disabled" href="#">Disabled</a>\
			  </li>\
			</ul>\
			<form class="form-inline my-2 my-lg-0">\
			  <input class="form-control me-sm-2" type="text" placeholder="Search" aria-label="Search">\
			  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>\
			</form>\
		  </div>\
		</nav>',

    properties: [{
        name: "Color theme",
        key: "color",
        htmlAttr: "class",
        validValues: ["navbar-light", "navbar-dark"],
        inputtype: SelectInput,
        data: {
            options: [{
                value: "",
                text: "Default"
            }, {
                value: "navbar-light",
                text: "Light"
            }, {
                value: "navbar-dark",
                text: "Dark"
            }]
        }
    }, {
        name: "Background color",
        key: "background",
        htmlAttr: "class",
        validValues: bgcolorClasses,
        inputtype: SelectInput,
        data: {
            options: bgcolorSelectOptions
        }
    }, {
        name: "Placement",
        key: "placement",
        htmlAttr: "class",
        validValues: ["fixed-top", "fixed-bottom", "sticky-top"],
        inputtype: SelectInput,
        data: {
            options: [{
                value: "",
                text: "Default"
            }, {
                value: "fixed-top",
                text: "Fixed Top"
            }, {
                value: "fixed-bottom",
                text: "Fixed Bottom"
            }, {
                value: "sticky-top",
                text: "Sticky top"
            }]
        }
    }]
});
Vvveb.Components.extend("_base", "html/form", {
    nodes: ["form"],
    image: "icons/form.svg",
    name: "Form",
    html: '<form><div class="mb-3"><label>Text</label><input type="text" class="form-control"></div></div></form>',
    properties: [{
        name: "Style",
        key: "style",
        htmlAttr: "class",
        validValues: ["", "form-search", "form-inline", "form-horizontal"],
        inputtype: SelectInput,
        data: {
            options: [{
                value: "",
                text: "Default"
            }, {
                value: "form-search",
                text: "Search"
            }, {
                value: "form-inline",
                text: "Inline"
            }, {
                value: "form-horizontal",
                text: "Horizontal"
            }]
        }
    }, {
        name: "Action",
        key: "action",
        htmlAttr: "action",
        inputtype: TextInput
    }, {
        name: "Method",
        key: "method",
        htmlAttr: "method",
        inputtype: TextInput
    }]
});
Vvveb.Components.extend("_base", "html/table", {
    nodes: ["table"],
    classes: ["table"],
    image: "icons/table.svg",
    name: "Table",
    html: '<table class="table">\
		  <thead>\
			<tr>\
			  <th>#</th>\
			  <th>First Name</th>\
			  <th>Last Name</th>\
			  <th>Username</th>\
			</tr>\
		  </thead>\
		  <tbody>\
			<tr>\
			  <th scope="row">1</th>\
			  <td>Mark</td>\
			  <td>Otto</td>\
			  <td>@mdo</td>\
			</tr>\
			<tr>\
			  <th scope="row">2</th>\
			  <td>Jacob</td>\
			  <td>Thornton</td>\
			  <td>@fat</td>\
			</tr>\
			<tr>\
			  <th scope="row">3</th>\
			  <td>Larry</td>\
			  <td>the Bird</td>\
			  <td>@twitter</td>\
			</tr>\
		  </tbody>\
		</table>',
    properties: [
        {
            name: "Type",
            key: "type",
            htmlAttr: "class",
            validValues: ["table-primary", "table-secondary", "table-success", "table-danger", "table-warning", "table-info", "table-light", "table-dark", "table-white"],
            inputtype: SelectInput,
            data: {
                options: [{
                    value: "Default",
                    text: ""
                }, {
                    value: "table-primary",
                    text: "Primary"
                }, {
                    value: "table-secondary",
                    text: "Secondary"
                }, {
                    value: "table-success",
                    text: "Success"
                }, {
                    value: "table-danger",
                    text: "Danger"
                }, {
                    value: "table-warning",
                    text: "Warning"
                }, {
                    value: "table-info",
                    text: "Info"
                }, {
                    value: "table-light",
                    text: "Light"
                }, {
                    value: "table-dark",
                    text: "Dark"
                }, {
                    value: "table-white",
                    text: "White"
                }]
            }
        },
        {
            name: "Responsive",
            key: "responsive",
            htmlAttr: "class",
            validValues: ["table-responsive"],
            inputtype: ToggleInput,
            data: {
                on: "table-responsive",
                off: ""
            }
        },
        {
            name: "Small",
            key: "small",
            htmlAttr: "class",
            validValues: ["table-sm"],
            inputtype: ToggleInput,
            data: {
                on: "table-sm",
                off: ""
            }
        },
        {
            name: "Hover",
            key: "hover",
            htmlAttr: "class",
            validValues: ["table-hover"],
            inputtype: ToggleInput,
            data: {
                on: "table-hover",
                off: ""
            }
        },
        {
            name: "Bordered",
            key: "bordered",
            htmlAttr: "class",
            validValues: ["table-bordered"],
            inputtype: ToggleInput,
            data: {
                on: "table-bordered",
                off: ""
            }
        },
        {
            name: "Striped",
            key: "striped",
            htmlAttr: "class",
            validValues: ["table-striped"],
            inputtype: ToggleInput,
            data: {
                on: "table-striped",
                off: ""
            }
        },
        {
            name: "Inverse",
            key: "inverse",
            htmlAttr: "class",
            validValues: ["table-inverse"],
            inputtype: ToggleInput,
            data: {
                on: "table-inverse",
                off: ""
            }
        },
        {
            name: "Head options",
            key: "head",
            htmlAttr: "class",
            child: "thead",
            inputtype: SelectInput,
            validValues: ["", "thead-inverse", "thead-default"],
            data: {
                options: [{
                    value: "",
                    text: "None"
                }, {
                    value: "thead-default",
                    text: "Default"
                }, {
                    value: "thead-inverse",
                    text: "Inverse"
                }]
            }
        }]
});
Vvveb.Components.extend("_base", "html/tablerow", {
    nodes: ["tr"],
    name: "Table Row",
    html: "<tr><td>Cell 1</td><td>Cell 2</td><td>Cell 3</td></tr>",
    properties: [{
        name: "Type",
        key: "type",
        htmlAttr: "class",
        inputtype: SelectInput,
        validValues: ["", "success", "danger", "warning", "active"],
        data: {
            options: [{
                value: "",
                text: "Default"
            }, {
                value: "success",
                text: "Success"
            }, {
                value: "error",
                text: "Error"
            }, {
                value: "warning",
                text: "Warning"
            }, {
                value: "active",
                text: "Active"
            }]
        }
    }]
});
Vvveb.Components.extend("_base", "html/tablecell", {
    nodes: ["td"],
    name: "Table Cell",
    html: "<td>Cell</td>"
});
Vvveb.Components.extend("_base", "html/tableheadercell", {
    nodes: ["th"],
    name: "Table Header Cell",
    html: "<th>Head</th>"
});
Vvveb.Components.extend("_base", "html/tablehead", {
    nodes: ["thead"],
    name: "Table Head",
    html: "<thead><tr><th>Head 1</th><th>Head 2</th><th>Head 3</th></tr></thead>",
    properties: [{
        name: "Type",
        key: "type",
        htmlAttr: "class",
        inputtype: SelectInput,
        validValues: ["", "success", "danger", "warning", "info"],
        data: {
            options: [{
                value: "",
                text: "Default"
            }, {
                value: "success",
                text: "Success"
            }, {
                value: "anger",
                text: "Error"
            }, {
                value: "warning",
                text: "Warning"
            }, {
                value: "info",
                text: "Info"
            }]
        }
    }]
});
Vvveb.Components.extend("_base", "html/tablebody", {
    nodes: ["tbody"],
    name: "Table Body",
    html: "<tbody><tr><td>Cell 1</td><td>Cell 2</td><td>Cell 3</td></tr></tbody>"
});

Vvveb.Components.add("html/gridcolumn", {
    name: "Grid Column",
    image: "icons/grid_row.svg",
    classesRegex: ["col-"],
    html: '<div class="col-sm-4"><h3>col-sm-4</h3></div>',
    properties: [{
        name: "Column",
        key: "column",
        inline: false,
        inputtype: GridInput,
        data: { hide_remove: true },

        beforeInit: function (node) {
            _class = $(node).attr("class");

            var reg = /col-([^-\$ ]*)?-?(\d+)/g;
            var match;

            while ((match = reg.exec(_class)) != null) {
                this.data["col" + ((match[1] != undefined) ? "_" + match[1] : "")] = match[2];
            }
        },

        onChange: function (node, value, input) {
            var _class = node.attr("class");

            //remove previous breakpoint column size
            _class = _class.replace(new RegExp(input.name + '-\\d+?'), '');
            //add new column size
            if (value) _class += ' ' + input.name + '-' + value;
            node.attr("class", _class);

            return node;
        },
    }]
});
Vvveb.Components.add("html/gridrow", {
    name: "Grid Row",
    image: "icons/grid_row.svg",
    classes: ["row"],
    html: '<div class="row"><div class="col-sm-4"><h3>col-sm-4</h3></div><div class="col-sm-4 col-5"><h3>col-sm-4</h3></div><div class="col-sm-4"><h3>col-sm-4</h3></div></div>',
    children: [{
        name: "html/gridcolumn",
        classesRegex: ["col-"],
    }],
    beforeInit: function (node) {
        properties = [];
        var i = 0;
        var j = 0;

        $(node).find('[class*="col-"]').each(function () {
            _class = $(this).attr("class");

            var reg = /col-([^-\$ ]*)?-?(\d+)/g;
            var match;
            var data = {};

            while ((match = reg.exec(_class)) != null) {
                data["col" + ((match[1] != undefined) ? "_" + match[1] : "")] = match[2];
            }

            i++;
            properties.push({
                name: "Column " + i,
                key: "column" + i,
                //index: i - 1,
                columnNode: this,
                col: 12,
                inline: false,
                inputtype: GridInput,
                data: data,
                onChange: function (node, value, input) {

                    //column = $('[class*="col-"]:eq(' + this.index + ')', node);
                    var column = $(this.columnNode);

                    //if remove button is clicked remove column and render row properties
                    if (input.nodeName == 'BUTTON') {
                        column.remove();
                        Vvveb.Components.render("html/gridrow");
                        return node;
                    }

                    //if select input then change column class
                    _class = column.attr("class");

                    //remove previous breakpoint column size
                    _class = _class.replace(new RegExp(input.name + '-\\d+?'), '');
                    //add new column size
                    if (value) _class += ' ' + input.name + '-' + value;
                    column.attr("class", _class);
                    return node;
                },
            });
        });

        //remove all column properties
        this.properties = this.properties.filter(function (item) {
            return item.key.indexOf("column") === -1;
        });

        //add remaining properties to generated column properties
        properties.push(this.properties[0]);

        this.properties = properties;
        return node;
    },

    properties: [{
        name: "Column",
        key: "column1",
        inputtype: GridInput
    }, {
        name: "Column",
        key: "column1",
        inline: true,
        col: 12,
        inputtype: GridInput
    }, {
        name: "",
        key: "addChild",
        inputtype: ButtonInput,
        data: { text: "Add column", icon: "fa fa-plus" },
        onChange: function (node) {
            $(node).append('<div class="col-3">Col-3</div>');

            //render component properties again to include the new column inputs
            Vvveb.Components.render("html/gridrow");

            return node;
        }
    }]
});
Vvveb.Components.extend("_base", "html/paragraph", {
    nodes: ["p"],
    name: "Paragraph",
    image: "icons/paragraph.svg",
    html: '<p>Lorem ipsum</p>',
    properties: [{
        name: "Text align",
        key: "text-align",
        htmlAttr: "class",
        inline: false,
        inputtype: SelectInput,
        validValues: ["", "text-start", "text-center", "text-end"],
        inputtype: RadioButtonInput,
        data: {
            extraclass: "btn-group-sm btn-group-fullwidth",
            options: [{
                value: "",
                icon: "fa fa-times",
                //text: "None",
                title: "None",
                checked: true,
            }, {
                value: "text-start",
                //text: "Left",
                title: "text-start",
                icon: "fa fa-align-left",
                checked: false,
            }, {
                value: "text-center",
                //text: "Center",
                title: "Center",
                icon: "fa fa-align-center",
                checked: false,
            }, {
                value: "text-end",
                //text: "Right",
                title: "Right",
                icon: "fa fa-align-right",
                checked: false,
            }],
        },
    }]
});

Vvveb.Components.extend("_base", "html/spacer", {
    classes: ["epb-block-spacer"],
    name: "Spacer",
    image: "icons/spacer.svg",
    html: '<div style="height:100px" aria-hidden="true" class="epb-block-spacer"></div>',
    properties: [
        {
            name: "Height",
            key: "height",
            htmlAttr: "style",
            inline: true,
            parent: "",
            inputtype: CssUnitInput,
        }]
});

Vvveb.Components.extend("_base", "html/carouselitem", {
    classes: ["carousel-item"],
    name: "Carousel Item",
    image: "icons/spacer.svg",
    html: `<div class="carousel-item active">
                <img src="https://source.unsplash.com/5bYxXawHOQg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Fusce egestas elit eget lorem</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
            </div>`,
    properties: [
        {
            name: "Interval",
            key: "data-interval",
            htmlAttr: 'data-interval',
            inputtype: TextInput,
        },
        {
            name: "",
            key: "removeChild",
            inputtype: LinkButton,
            data: { text: "Remove Slide", icon: "fa fa-trash", className: "text-danger" },
            onChange: function (node) {
                node.remove();
            }
        }
    ]
});

Vvveb.Components.add("html/carousel", {
    name: "Carousel",
    image: "icons/carousel.svg",
    classes: ["carousel"],
    id: Math.random().toString(36).substr(2, 3),
    html: (() => {
        var id = Math.random().toString(36).substr(2, 3);
        return `<div id="carousel-${id}" class="carousel slide carousel-fade" data-ride="carousel">
                <!--Indicators-->
                <ol class="carousel-indicators d-none"  data-vvveb-disabled-area="">
                    <li data-target="#carousel-${id}" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-${id}" data-slide-to="1"></li>
                    <li data-target="#carousel-${id}" data-slide-to="2"></li>
                </ol>
                <!--/.Indicators-->
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="view">
                    <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(68).jpg"
                        alt="First slide">
                    </div>
                    <div class="carousel-caption">
                    <h3 class="h3-responsive">Light mask</h3>
                    <p>First text</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <!--Mask color-->
                    <div class="view">
                    <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(6).jpg"
                        alt="Second slide">
                    </div>
                    <div class="carousel-caption">
                    <h3 class="h3-responsive">Strong mask</h3>
                    <p>Secondary text</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <!--Mask color-->
                    <div class="view">
                    <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(9).jpg" alt="Third slide">
                    </div>
                    <div class="carousel-caption">
                    <h3 class="h3-responsive">Slight mask</h3>
                    <p>Third text</p>
                    </div>
                </div>
                </div>
                <!--/.Slides-->
                <!--Controls-->
                <div class="carousel-control-div d-none">
                    <a class="carousel-control carousel-control-prev" href="#carousel-${id}" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon fa fa-angle-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control carousel-control-next" href="#carousel-${id}" role="button" data-slide="next">
                    <span class="carousel-control-next-icon fa fa-angle-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </a>
                </div>
                <!--/.Controls-->
            </div>`
    })(),
    beforeInit: function (node) {
        properties = [];
        var i = 0;
        var j = 0;
        properties.push(this.properties[0]);
        properties.push(this.properties[1]);
        properties.push(this.properties[2]);
        properties.push(this.properties[3]);

        $(node).find('[class*="carousel-item"]').each(function () {
            i++;
            properties.push({
                name: "Slide " + i,
                key: "slideitem" + i,
                classes: ['btn btn-danger'],
                columnNode: this,
                inputtype: LinkButton,
                data: { text: "Remove Slide", icon: "fa fa-trash", className: 'text-danger' },
                onChange: function (node, value, input) {
                    var Slide = $(this.columnNode);
                    if (Slide.siblings().length < 1) {
                        alert('Slider should have at least one slide');
                        return node;
                    }

                    if ($(Slide).hasClass('active')) {
                        $(Slide).prev().addClass('active');
                    }

                    Slide.remove();
                    $(node).find('.carousel-indicators').children().last().remove();
                    Vvveb.Components.render("html/carousel");
                    return node;
                },
            });
        });

        $(node).find('[class*="carousel"]').carousel();
        
        // $(node).delegate(".carousel-control-next", "click", function(){
        //     $(node).find('[class*="carousel"]').carousel("next");
        // });

        // $(node).delegate(".carousel-control-prev", "click", function(){
        //     $(node).find('[class*="carousel"]').carousel("prev");
        // });

        //add remaining properties to generated column properties
        this.properties = properties;
        return node;
    },

    properties: [{
        name: "",
        key: "addChild",
        inputtype: ButtonInput,
        data: { text: "Add Slide", icon: "fa fa-plus" },
        onChange: function (node) {
            $(node).find('[class*="carousel"]').carousel('dispose');

            var slideindex = $(node).find('.carousel-indicators').children().last().data('slide-to');
            $(node).find('.carousel-indicators').append(`<li data-target="#${$(node).get(0).id}" data-slide-to="${1 + parseInt(slideindex)}"></li>`);
            
            $(node).find('.carousel-inner').append(`<div class="carousel-item">
                <img src="https://source.unsplash.com/5bYxXawHOQg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Fusce egestas elit eget lorem</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
            </div>`);
            //render component properties again to include the new slide.
            Vvveb.Components.render("html/carousel");
            return node;
        }
    }, {
        name: "Fade",
        key: "carousel-fade",
        htmlAttr: "class",
        inputtype: ToggleInput,
        validValues: ["carousel-fade"],
        data: {
            on: "carousel-fade",
            off: null
        }
    }, {
        name: "Hide Controls",
        key: "controls",
        inputtype: ToggleInput,
        validValues: ["d-none"],
        child: '.carousel-control-div',
        htmlAttr: "class",
        data: {
            on: "d-none",
            off: null
        },
        onChange: function (node, value, input) {
            // if (value === 'd-none') {
            //     $(node).find('.carousel-control-prev').addClass('d-none');
            //     $(node).find('.carousel-control-next').addClass('d-none');
            // } else {
            //     $(node).find('.carousel-control-next').removeClass('d-none');
            //     $(node).find('.carousel-control-prev').removeClass('d-none');
            // }
            $(node).find('[class*="carousel"]').carousel();
            
            // $(node).delegate(".carousel-control-next", "click", function(){
            //     $(node).find('[class*="carousel"]').carousel("next");
            // });
            
            // $(node).delegate(".carousel-control-prev", "click", function(){
            //     $(node).find('[class*="carousel"]').carousel("prev");
            // });
            return node;
        }
    }, {
        name: "Indicator Type",
        key: "indicatortype",
        inputtype: SelectInput,
        child: 'ol.carousel-indicators',
        htmlAttr: "class",
        validValues: ["d-none", 'ind-square', 'ind-dash', 'ind-circle'],
        data: {
            options: [{
                value: "d-none",
                text: "None"
            }, {
                value: "ind-square",
                text: "Square"
            }, {
                value: "ind-dash",
                text: "Dash"
            }, {
                value: "ind-circle",
                text: "Circular"
            }]
        },
        onChange: function (node, value, input) {
            $(node).find('.carousel-indicators').data("target", $(node).get(0).id);
            $(node).find('.carousel-indicators').removeClass('ind-square ind-dash ind-circle d-none');
            $(node).find('.carousel-indicators').addClass(value);
            return node;
        }
    }
    ]
});

