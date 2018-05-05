// данный файл не входит в состав pdfjs и нужен для вызова окна печати без просмотра
// вызов скрипта добавлен в viewer.html после <script src="viewer.js"></script>
(function (modal) {
	function printWhenReady() {
		if (typeof PDFViewerApplication !== 'undefined' && PDFViewerApplication.initialized &&
			PDFViewerApplication.pdfViewer && PDFViewerApplication.pdfViewer.pageViewsReady) {

			modal.CloseTrobberDiv2(trobberId);
			window.print();
		}
		else {
			window.setTimeout(printWhenReady, 2000);
		}
	};

	var trobberId = modal.CreateTrobberDiv2();
	printWhenReady();
})(parent.ModalWindowsFunction);