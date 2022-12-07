const navLinks = document.querySelector('.nav--links')
const navMenu = document.querySelector('.nav--menu')
const navLinksItems = document.querySelectorAll('.nav--links a')

navMenu.addEventListener('click', () => {
	navLinks.classList.toggle('show')
})

navLinksItems.forEach(item => {
	item.addEventListener('click', () => {
		navLinks.classList.remove('show')
	})
})

document.addEventListener('scroll', () => {
    navLinks.classList.remove('show')
})