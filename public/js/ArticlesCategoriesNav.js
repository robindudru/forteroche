class ArticlesCategoriesNav {
	constructor() {
		$('.draftArticle').hide();
		$('.trashArticle').hide();
		this.listener();
	}

	listener(){
		$('#published').on('click', () => {
			$('.active').fadeOut(400, () => {
				$('.active').removeClass('active');
				$('.publishedArticle').fadeIn(400).addClass('active');
			});
		});
		$('#draft').on('click', () => {
			$('.active').fadeOut(400, () => {
				$('.active').removeClass('active');
				$('.draftArticle').fadeIn(400).addClass('active');
			});
		});
		$('#trash').on('click', () => {
			$('.active').fadeOut(400, () => {
				$('.active').removeClass('active');
				$('.trashArticle').fadeIn(400).addClass('active');
			});
		});
	}
}