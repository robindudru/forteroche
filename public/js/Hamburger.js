class Hamburger {
	constructor() {
		this.navListener();
	}

	navListener() {
		const _this = this;
		$('#hamburger').on('click', () => {_this.show()});
		$('#drawer-close').on('click', () => {_this.hide()});
	}

	show(){
		$('#drawer-menu').animate({width:'50vw'});
	}

	hide() {
		$('#drawer-menu').animate({width:0});
	}
}