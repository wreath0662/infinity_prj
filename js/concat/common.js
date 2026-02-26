/*-------------------------------------------*/
/* 変数
/*-------------------------------------------*/

const body = document.body;
const width = window.innerWidth;
const header = document.querySelector("header");

/*-------------------------------------------*/
/* フェードアニメーション
/*-------------------------------------------*/
let myTarget = document.querySelectorAll('[class*="fade-"]');

fadeFn();

function fadeFn() {
    let observerFadeFn;
    let fadeFnOptions = {
        root: null,
        rootMargin: "0px 0px",
        threshold: "0.1",
    };
    observerFadeFn = new IntersectionObserver(fadeIntersect, fadeFnOptions);

    for (let n = 0; n < myTarget.length; n++) {
        observerFadeFn.observe(myTarget[n]);
    }
}

function fadeIntersect(entries, observerFadeFn) {
    entries.forEach((entry, n) => {
        const nowElement = entry.target;

        if (entry.isIntersecting) {
            nowElement.classList.add("fade-action");
        }
    });
}

/*-------------------------------------------*/
/* スムーススクロール
/*-------------------------------------------*/
const headerHeight = header ? header.offsetHeight + -60 : 0;

// ページ内のスムーススクロール
for (const link of document.querySelectorAll('a[href*="#"]')) {
    link.addEventListener("click", (e) => {
        const hash = e.currentTarget.hash;
        const target = document.getElementById(hash.slice(1));

        if (!hash || hash === "#top") {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: "smooth",
            });
        } else if (target) {
            e.preventDefault();
            const position = target.getBoundingClientRect().top + window.scrollY - headerHeight;
            window.scrollTo({
                top: position,
                behavior: "smooth",
            });
            history.replaceState(null, "", window.location.pathname);
        }
    });
}

const urlHash = window.location.hash;
if (urlHash) {
    const target = document.getElementById(urlHash.slice(1));
    if (target) {
        history.replaceState(null, "", window.location.pathname);
        window.scrollTo(0, 0);

        window.addEventListener("load", () => {
            const position = target.getBoundingClientRect().top + window.scrollY - headerHeight;
            window.scrollTo({
                top: position,
                behavior: "smooth",
            });
        });
    }
}

/*-------------------------------------------*/
/* 関数実行
/*-------------------------------------------*/
window.addEventListener("load", () => {});

/*-------------------------------------------*/
/* ハンバーガーメニュー
/*-------------------------------------------*/
document.addEventListener("DOMContentLoaded", function () {
    const hbgBtn = document.querySelector(".hamburger_btn");
    const hbgMenu = document.querySelector(".hamburger_menu");
    const hbgMenuLinks = document.querySelectorAll(".hamburger_menu_list a");
    const body = document.body;

    if (!hbgBtn || !hbgMenu) return; // ← これ重要！エラー防止

    hbgBtn.addEventListener("click", () => {
        hbgBtn.classList.toggle("active");
        hbgMenu.classList.toggle("open");

        if (hbgMenu.classList.contains("open")) {
            body.style.overflow = "hidden";
        } else {
            body.style.overflow = "visible";
        }
    });

    hbgMenuLinks.forEach((link) => {
        link.addEventListener("click", () => {
            hbgBtn.classList.remove("active");
            hbgMenu.classList.remove("open");
            body.style.overflow = "visible";
        });
    });
});

/*-------------------------------------------*/
/* ヘッダースクロール制御
/*-------------------------------------------*/
const headerEl = document.querySelector(".l-header");

if (headerEl) {
    window.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
            headerEl.classList.add("is-scrolled");
        } else {
            headerEl.classList.remove("is-scrolled");
        }
    });
}
