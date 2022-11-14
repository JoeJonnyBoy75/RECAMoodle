Vvveb.CodeEditor = {

	isActive: false,
	oldValue: '',
	doc: false,
	codemirror: false,

	init: function (doc) {

		if (this.codemirror == false) {
			this.codemirror = CodeMirror.fromTextArea(document.querySelector("#vvveb-code-editor textarea"), {
				mode: 'text/html',
				lineNumbers: true,
				autofocus: true,
				lineWrapping: true,
				//viewportMargin:Infinity,
				theme: 'material',
				// autoRefresh: true,
			});

			this.isActive = true;
			this.codemirror.getDoc().on("change", function (e, v) {
				if (v.origin != "setValue")
					delay(Vvveb.Builder.frameBody.html(e.getValue()), 1000);
			});
		}


		//load code on document changes
		Vvveb.Builder.frameBody.on("vvveb.undo.add vvveb.undo.restore", function (e) { Vvveb.CodeEditor.setValue(e); });
		//load code when a new url is loaded
		Vvveb.Builder.documentFrame.on("load", function (e) { Vvveb.CodeEditor.setValue(); });

		this.isActive = true;
		this.setValue();

		return this.codemirror;
	},

	setValue: function (value) {
		if (this.isActive == true) {
			var scrollInfo = this.codemirror.getScrollInfo();
			this.codemirror.setValue(Vvveb.Builder.frameBody.html().trim());
			this.codemirror.scrollTo(scrollInfo.left, scrollInfo.top);
		}
		this.codemirror.refresh();
	},

	destroy: function (element) {
		/*
		//save memory by destroying but lose scroll on editor toggle
		this.codemirror.toTextArea();
		this.codemirror = false;
		*/
		this.isActive = false;
	},

	toggle: function () {
		if (this.isActive != true) {
			$('#vvveb-code-editor').removeClass('d-none');
			this.isActive = true;
			return this.init();
		} else {
			$('#vvveb-code-editor').addClass('d-none');
		}
		this.isActive = false;
		this.destroy();
	}
}
