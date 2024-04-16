// logic ini apabila digunakan muncul bug

// const navbar = document.getElementById('navbar');
// const navbar_2 = document.getElementById('navbar_2');
// const navbar_mobile = document.getElementById('navbar_mobile');
// const navbar_mobile_2 = document.getElementById('navbar_mobile_2');
// function handleScroll() {
//     if (window.scrollY > 280) {
//         navbar.classList.add('w-full');
//         navbar.classList.add('fixed');
//         navbar.classList.add('-mt-[280px]');
//         navbar_2.classList.add('bg-white');

//         navbar_mobile.classList.add('w-full');
//         navbar_mobile.classList.add('fixed');
//         navbar_mobile.classList.add('-mt-[280px]');
//         navbar_mobile_2.classList.add('bg-white');
//         navbar_mobile.classList.add('halo-sem');

//     } else {
//         navbar.classList.remove('w-full');
//         navbar.classList.remove('fixed');
//         navbar.classList.remove('-mt-[280px]');
//         navbar_2.classList.remove('bg-white');

//         navbar_mobile.classList.remove('w-full');
//         navbar_mobile.classList.remove('fixed');
//         navbar_mobile.classList.remove('-mt-[280px]');
//         navbar_mobile_2.classList.remove('bg-white');
//         navbar_mobile.classList.remove('halo-sem');
//     }
// }
// window.addEventListener('scroll', handleScroll);

// 01.SubMenu Dropdown Toggle
if ($('.tp-main-menu nav > ul > li.has-dropdown > a').length) {
    $('.tp-main-menu nav > ul > li.has-dropdown > a').append('<i class="fal fa-angle-down"></i>');
}

//02. nvbar handle scroll
const navbar = document.getElementById('navbar');
const navbar_2 = document.getElementById('navbar_2');
const navbar_mobile = document.getElementById('navbar_mobile');
const navbar_mobile_2 = document.getElementById('navbar_mobile_2');


function handleScroll() {
    if (window.scrollY > 280) {
        navbar.classList.add('w-full', 'fixed', '-mt-[280px]');
        navbar_2.classList.add('bg-white');
        navbar_mobile.classList.add('w-full', 'fixed', '-mt-[280px]', 'halo-sem');
        navbar_mobile_2.classList.add('bg-white');
    } else {
        navbar.classList.remove('w-full', 'fixed', '-mt-[280px]');
        navbar_2.classList.remove('bg-white');
        navbar_mobile.classList.remove('w-full', 'fixed', '-mt-[280px]', 'halo-sem');
        navbar_mobile_2.classList.remove('bg-white');
    }
}

window.addEventListener('scroll', handleScroll);

document.addEventListener('DOMContentLoaded', function () {
    navbar.classList.add('w-full', 'fixed', '-mt-[280px]');
    navbar_2.classList.add('bg-white');
    navbar_mobile.classList.add('w-full', 'fixed', '-mt-[280px]', 'halo-sem');
    navbar_mobile_2.classList.add('bg-white');

    setTimeout(function () {
        navbar.classList.remove('w-full', 'fixed', '-mt-[280px]');
        navbar_mobile.classList.remove('w-full', 'fixed', '-mt-[280px]', 'halo-sem');
    }, 100);
});

//04. product list
// document.addEventListener('DOMContentLoaded', function () {
//     const availabilityDropdownButton = document.getElementById('availabilityDropdownButton');
//     const availabilityCheckboxContainer = document.getElementById('availabilityCheckboxContainer');
//     const subcategoryDropdownButton = document.getElementById('subcategoryDropdownButton');
//     const subcategoryCheckboxContainer = document.getElementById('subcategoryCheckboxContainer');
//     const priceDropdownButton = document.getElementById('priceDropdownButton');
//     const priceCheckboxContainer = document.getElementById('priceCheckboxContainer');
//     const sizeDropdownButton = document.getElementById('sizeDropdownButton');
//     const sizeCheckboxContainer = document.getElementById('sizeCheckboxContainer');
//     const resetButton = document.getElementById('resetButton');
//     const priceInputs = document.querySelectorAll('#priceCheckboxContainer input[type="number"]');

//     // Tambahkan event listener untuk dropdown AVAILABILITY
//     availabilityDropdownButton.addEventListener('click', function () {
//         toggleDropdown(availabilityCheckboxContainer, availabilityDropdownButton);
//     });

//     // Tambahkan event listener untuk dropdown SUB CATEGORY
//     subcategoryDropdownButton.addEventListener('click', function () {
//         toggleDropdown(subcategoryCheckboxContainer, subcategoryDropdownButton);
//     });

//     // Tambahkan event listener untuk dropdown PRICE
//     priceDropdownButton.addEventListener('click', function () {
//         toggleDropdown(priceCheckboxContainer, priceDropdownButton);
//     });

//     // Tambahkan event listener untuk dropdown SIZE
//     sizeDropdownButton.addEventListener('click', function () {
//         toggleDropdown(sizeCheckboxContainer, sizeDropdownButton);
//     });

//     // Fungsi untuk toggle dropdown
//     function toggleDropdown(checkboxContainer, dropdownButton) {
//         if (checkboxContainer.style.display === 'none') {
//             checkboxContainer.style.display = 'block';
//             dropdownButton.classList.remove('fa-angle-up');
//             dropdownButton.classList.add('fa-angle-down');
//         } else {
//             checkboxContainer.style.display = 'none';
//             dropdownButton.classList.remove('fa-angle-down');
//             dropdownButton.classList.add('fa-angle-up');
//         }
//     }

//     // Fungsi untuk reset
//     resetButton.addEventListener('click', function () {
//         // Reset semua input
//         const allInputs = document.querySelectorAll('input');
//         allInputs.forEach(input => {
//             if (input.type === 'checkbox' || input.type === 'number') {
//                 input.checked = false;
//                 input.value = '';
//             }
//         });

//         // Reset ukuran tombol
//         const sizeButtons = document.querySelectorAll('.size-button');
//         sizeButtons.forEach(button => {
//             button.classList.remove('active-size');
//         });

//         // Reset checkbox SUB CATEGORY
//         const subcategoryCheckboxes = document.querySelectorAll('input[name="subcategory"]');
//         subcategoryCheckboxes.forEach(checkbox => {
//             checkbox.checked = false;
//         });

//         // Reset checkbox AVAILABILITY
//         const availabilityCheckboxes = document.querySelectorAll('input[name="availability"]');
//         availabilityCheckboxes.forEach(checkbox => {
//             checkbox.checked = false;
//         });
//     });

//     // Tambahkan event listener untuk checkbox SUB CATEGORY
//     const subcategoryCheckboxes = document.querySelectorAll('input[name="subcategory"]');

//     subcategoryCheckboxes.forEach(checkbox => {
//         checkbox.addEventListener('click', function () {
//             toggleCheckboxes(subcategoryCheckboxes, this);
//         });
//     });

//     // Tambahkan event listener untuk checkbox AVAILABILITY
//     const availabilityCheckboxes = document.querySelectorAll('input[name="availability"]');

//     availabilityCheckboxes.forEach(checkbox => {
//         checkbox.addEventListener('click', function () {
//             toggleCheckboxes(availabilityCheckboxes, this);
//         });
//     });

//     // Fungsi untuk toggle checkbox
//     function toggleCheckboxes(checkboxes, clickedCheckbox) {
//         checkboxes.forEach(checkbox => {
//             if (checkbox !== clickedCheckbox) {
//                 checkbox.checked = false;
//             }
//         });
//     }

//     // Tambahkan event listener untuk tombol ukuran
//     const sizeButtons = document.querySelectorAll('.size-button');

//     sizeButtons.forEach(button => {
//         button.addEventListener('click', function () {
//             toggleSizeButton(button);
//         });
//     });

//     // Fungsi untuk toggle tombol ukuran
//     function toggleSizeButton(button) {
//         sizeButtons.forEach(btn => {
//             btn.classList.remove('active-size');
//         });
//         button.classList.toggle('active-size');
//     }

//     // Validasi input PRICE agar tidak kurang dari 0
//     priceInputs.forEach(input => {
//         input.addEventListener('input', function () {
//             if (parseFloat(this.value) < 0) {
//                 this.value = 0;
//             }
//         });
//     });
// });


// ----active card ---------
let lastClickedCard = null;

document.querySelectorAll('.halo').forEach(card => {
    card.addEventListener('click', function () {
        if (lastClickedCard && lastClickedCard !== card) {
            lastClickedCard.classList.remove('control-shadow-1');
            lastClickedCard.querySelector('button').classList.remove('control-button-1');
        }

        card.classList.toggle('control-shadow-1');
        card.querySelector('button').classList.toggle('control-button-1');

        lastClickedCard = card;

        setTimeout(() => {
            card.classList.remove('control-shadow-1');
            card.querySelector('button').classList.remove('control-button-1');
        }, 3000);
    });
});

// ----sidebar filter ----
// const allFilterButton = document.querySelector('.set-setter');
// const allFilterElement = document.getElementById('all-filter');

// allFilterButton.addEventListener('click', function() {
//     const isHidden = allFilterElement.classList.contains('hidden');
//     if (isHidden) {
//         allFilterElement.classList.remove('hidden');
//         allFilterElement.classList.add('slide-in-left');
//     } else {
//         allFilterElement.classList.remove('slide-in-left');
//         allFilterElement.classList.add('slide-out-right');
//         setTimeout(() => {
//             allFilterElement.classList.add('hidden');
//         }, 500); 
//     }
// });


// ----sidebar navbar parent-----
document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.getElementById('toggleSidebar');
    const closeButton = document.getElementById('closeSidebar');
    const sidebar = document.getElementById('sidebar');
    const bgDarkNav = document.getElementById('bg-dark-nav');

    function toggleSidebar() {
        sidebar.classList.toggle('hidden');
        bgDarkNav.classList.toggle('nav-close');

        toggleButton.classList.toggle('hidden');
        closeButton.classList.toggle('hidden');
    }

    toggleButton.addEventListener('click', toggleSidebar);
    closeButton.addEventListener('click', function () {
        toggleSidebar();
        bgDarkNav.classList.remove('nav-close');
    });

    document.addEventListener('click', function (event) {
        const target = event.target;
        const isClickInsideSidebar = sidebar.contains(target);
        const isClickOnToggleButton = toggleButton.contains(target);

        if (!isClickInsideSidebar && !isClickOnToggleButton) {
            sidebar.classList.add('hidden');
            bgDarkNav.classList.remove('nav-close');

            toggleButton.classList.remove('hidden');
            closeButton.classList.add('hidden');
        }
    });
});

// ----sidebar filter 12 ----
// document.addEventListener('DOMContentLoaded', function () {
//     const toggleButton = document.getElementById('filter_12');
//     const closeButton = document.getElementById('closeSidebar-1');
//     const sidebar = document.getElementById('all-filter');
//     const bgDarkNav = document.getElementById('bg-dark-nav-1');

//     function filter_12() {
//         sidebar.classList.toggle('hidden');
//         bgDarkNav.classList.toggle('nav-close-1');

//         toggleButton.classList.toggle('hidden');
//         closeButton.classList.toggle('hidden');
//     }

//     toggleButton.addEventListener('click', filter_12);
//     closeButton.addEventListener('click', function () {
//         filter_12();
//         bgDarkNav.classList.remove('nav-close-1');
//     });

//     document.addEventListener('click', function (event) {
//         const target = event.target;
//         const isClickInsideSidebar = sidebar.contains(target);
//         const isClickOnToggleButton = toggleButton.contains(target);

//         if (!isClickInsideSidebar && !isClickOnToggleButton) {
//             sidebar.classList.add('hidden');
//             bgDarkNav.classList.remove('nav-close-1');

//             toggleButton.classList.remove('hidden');
//             closeButton.classList.add('hidden');
//         }
//     });
// });
document.addEventListener('DOMContentLoaded', function () {
    const toggleButtons = document.querySelectorAll('.filter-toggle');
    const closeButtons = document.querySelectorAll('.close-sidebar-toggle');
    const sidebars = document.querySelectorAll('.all-filter');
    const bgDarkNavs = document.querySelectorAll('.bg-dark-nav');

    function toggleSidebar(button, sidebar, bgDarkNav) {
        sidebar.classList.toggle('hidden');
        bgDarkNav.classList.toggle('nav-close');

        closeButtons.forEach((closeButton, index) => {
            if (sidebar === sidebars[index]) {
                closeButton.classList.toggle('hidden');
            }
        });

        button.classList.toggle('hidden');
    }

    toggleButtons.forEach((toggleButton, index) => {
        toggleButton.addEventListener('click', function () {
            toggleSidebar(toggleButton, sidebars[index], bgDarkNavs[index]);
        });
    });

    closeButtons.forEach((closeButton, index) => {
        closeButton.addEventListener('click', function () {
            toggleSidebar(toggleButtons[index], sidebars[index], bgDarkNavs[index]);
            bgDarkNavs[index].classList.remove('nav-close');
        });
    });

    document.addEventListener('click', function (event) {
        const target = event.target;
        const isClickInsideSidebar = Array.from(sidebars).some(sidebar => sidebar.contains(target));
        const isClickOnToggleButton = Array.from(toggleButtons).some(toggleButton => toggleButton.contains(target));

        if (!isClickInsideSidebar && !isClickOnToggleButton) {
            sidebars.forEach((sidebar, index) => {
                sidebar.classList.add('hidden');
                bgDarkNavs[index].classList.remove('nav-close');
                toggleButtons[index].classList.remove('hidden');
                closeButtons[index].classList.add('hidden');
            });
        }
    });
});

// --------sidebar filter 13 ------
// document.addEventListener('DOMContentLoaded', function () {
//     const toggleButton = document.getElementById('filter_13');
//     const closeButton = document.getElementById('closeSidebar-2');
//     const sidebar = document.getElementById('all-filter-2');
//     const bgDarkNav = document.getElementById('bg-dark-nav-2');

//     function filter_13() {
//         sidebar.classList.toggle('hidden');
//         bgDarkNav.classList.toggle('nav-close-2');

//         toggleButton.classList.toggle('hidden');
//         closeButton.classList.toggle('hidden');
//     }

//     toggleButton.addEventListener('click', filter_13);
//     closeButton.addEventListener('click', function () {
//         filter_13();
//         bgDarkNav.classList.remove('nav-close-2');
//     });

//     document.addEventListener('click', function (event) {
//         const target = event.target;
//         const isClickInsideSidebar = sidebar.contains(target);
//         const isClickOnToggleButton = toggleButton.contains(target);

//         if (!isClickInsideSidebar && !isClickOnToggleButton) {
//             sidebar.classList.add('hidden');
//             bgDarkNav.classList.remove('nav-close-2');

//             toggleButton.classList.remove('hidden');
//             closeButton.classList.add('hidden');
//         }
//     });
// });

// product list -2
document.addEventListener('DOMContentLoaded', function () {
    var availabilityDropdownButtons = document.querySelectorAll('.availabilityDropdownButton');
    var subcategoryDropdownButtons = document.querySelectorAll('.subcategoryDropdownButton');
    var priceDropdownButtons = document.querySelectorAll('.priceDropdownButton');
    var sizeDropdownButtons = document.querySelectorAll('.sizeDropdownButton');
    var availabilityCheckboxContainers = document.querySelectorAll('.availabilityCheckboxContainer');
    var subcategoryCheckboxContainers = document.querySelectorAll('.subcategoryCheckboxContainer');
    var priceCheckboxContainers = document.querySelectorAll('.priceCheckboxContainer');
    var sizeCheckboxContainers = document.querySelectorAll('.sizeCheckboxContainer');
    var resetButtons = document.querySelectorAll('.resetButton');
    const sizeButtons = document.querySelectorAll('.size-button');

    availabilityDropdownButtons.forEach((button, index) => {
        button.addEventListener('click', function () {
            toggleDropdown(availabilityCheckboxContainers[index], this);
        });
    });

    subcategoryDropdownButtons.forEach((button, index) => {
        button.addEventListener('click', function () {
            toggleDropdown(subcategoryCheckboxContainers[index], this);
        });
    });

    priceDropdownButtons.forEach((button, index) => {
        button.addEventListener('click', function () {
            toggleDropdown(priceCheckboxContainers[index], this);
        });
    });

    sizeDropdownButtons.forEach((button, index) => {
        button.addEventListener('click', function () {
            toggleDropdown(sizeCheckboxContainers[index], this);
        });
    });

    sizeButtons.forEach(button => {
        button.addEventListener('click', function () {
            toggleSizeButton(button);
        });
    });

    resetButtons.forEach(button => {
        button.addEventListener('click', function () {
            resetFilters();
        });
    });

    function toggleDropdown(container, button) {
        if (container.style.display === 'none') {
            container.style.display = 'block';
            button.classList.remove('fa-angle-down');
            button.classList.add('fa-angle-up');
        } else {
            container.style.display = 'none';
            button.classList.remove('fa-angle-up');
            button.classList.add('fa-angle-down');
        }
    }

    function toggleSizeButton(button) {
        sizeButtons.forEach(btn => {
            btn.classList.remove('active-size');
        });
        button.classList.toggle('active-size');
    }

    function resetFilters() {
        // Reset checkboxes and radio buttons
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        var radios = document.querySelectorAll('input[type="radio"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = false;
        });
        radios.forEach(radio => {
            radio.checked = false;
        });

        // Reset size buttons
        sizeButtons.forEach(button => {
            button.classList.remove('active-size');
        });

        // Reset input prices and limit them to not go below 0
        var priceInputs = document.querySelectorAll('input[type="number"]');
        priceInputs.forEach(input => {
            input.value = " ";
            input.min = 0; // Set minimum value to 0
        });
    }
});


// --------Share This Post (blog) ------
function copyUrl(url) {
    var textArea = document.createElement("textarea");
    textArea.value = url;
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand("Copy");
    document.body.removeChild(textArea);
    window.scrollTo(0, 0);
    alertCustom("Link telah berhasil disalin ke clipboard.", 2000);
}

function alertCustom(message, duration) {
    var alert = document.createElement("div");
    alert.setAttribute("class", "alert-custom");
    alert.textContent = message;
    document.body.appendChild(alert);
    setTimeout(function () {
        alert.parentNode.removeChild(alert);
    }, duration);
}


// --------control slider detail produk  ------
// document.addEventListener('DOMContentLoaded', function () {
//     var thumbnailSplide = new Splide('.thumbnail-slider', {
//         direction: 'ttb',
//         height: '25rem',
//         type: 'loop',
//         wheel: true,
//         pagination: false,
//         perPage: 3,
//         rewind: true,
//         perMove: 1,
//         focus: 'center',
//         lazyLoad: 'nearby',
//         arrows: false,
//     });

//     var mainSplide = new Splide('.main-slider', {
//         heightRatio: 1.1,
//         pagination: false,
//         arrows: false,
//     });

//     thumbnailSplide.sync(mainSplide);


//     thumbnailSplide.mount();


//     mainSplide.mount();
// });

// slider detil bawah
// document.addEventListener('DOMContentLoaded', function () {
//     var splide = new Splide('.splide-1', {
//         perPage: 2,
//         rewind: true,
//         pagination: false,
//         perMove: 1,
//         gap: '90px',
//         type: 'loop',
//         breakpoints: {
//             768: {
//                 perPage: 1,
//             }
//         }
//     });

//     splide.mount();
// });

// ---scelecton---
const allscelecton = document.querySelectorAll('.skelecton');

window.addEventListener('load', function () {
    setTimeout(function () {
        allscelecton.forEach(item => {
            item.classList.remove('skelecton');
        });
    }, 200);
});

// dropdownn navabr mobile
document.addEventListener("DOMContentLoaded", function () {
    var dropdownToggles = document.querySelectorAll('.dropdown-toggle');

    dropdownToggles.forEach(function (toggle) {
        toggle.addEventListener('click', function () {
            var dropdownMenu = toggle.nextElementSibling;
            if (dropdownMenu.style.display === 'none' || dropdownMenu.style.display ===
                '') {
                dropdownMenu.style.display = 'block';
                toggle.querySelector('i').classList.remove('fa-chevron-down');
                toggle.querySelector('i').classList.add('fa-chevron-up');
            } else {
                dropdownMenu.style.display = 'none';
                toggle.querySelector('i').classList.remove('fa-chevron-up');
                toggle.querySelector('i').classList.add('fa-chevron-down');
            }
        });
    });
});