/* eslint-disable camelcase */
/* eslint-disable no-unused-vars */
/* eslint-disable require-jsdoc */
/* eslint-disable valid-jsdoc */
/* eslint-disable */
define('local_edwiserpagebuilder/edwiserfrompreview', ['jquery', 'core/ajax', 'local_edwiserform/form_styles', 'local_edwiserform/iefixes', 'local_edwiserform/formviewer'], function ($, ajax, formStyles) {
    function get_from_data(formid) {
        return ajax.call([{
            methodname: 'edwiserform_get_form_definition',
            args: {
                form_id: formid,
                countries: typeof window['countries'] == 'undefined' || true
            }
        }]);
    }

    render_form = (ele) => {
        var formid = $(ele)[0].dataset.formid;
        var formdata = get_from_data(formid);
        var rootcont = $(ele).find('.edwiserform-root-container').find('.edwiserform-wrap-container');
        var form = $(ele).find('.edwiserform-root-container').find('.edwiserform-wrap-container').find('.edwiserform-container');

        var formOptions = {
            container: form.get(0),
            sitekey: M.cfg.sesskey,
            countries: null,
            localStorage: false,
        };
        formdata[0].done(function (responce) {
            if (responce.status != false) {
                formOptions.countries = responce.countries;
                $(rootcont).prepend(`<h2 class='form-header'>${responce.title}</h2>`);
                var formeo = new Formeo(formOptions, responce.definition);
                formeo.render(form.get(0));
                formStyles.apply($(form).find('.formeo-render'), 'add', responce.style);
            }
        });
    }
    render_all_form = () => {
        var editorbody = $("#iframe1").contents().find("body");
        $.each($(editorbody).find('.edwiser-pb-form-wrap'), function (index, ele) {
            render_form(this);
        });
    };

    return {
        render_all_form: this.render_all_form,
        render_form: this.render_form,
        init: function () {
            $(document).ready(function () {
                Vvveb.Builder.iframe.onload = function () { render_all_form() };
            });
        }
    }
});
