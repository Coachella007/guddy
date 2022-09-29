const SideNav = document.querySelector(".userMiniSideBar");
console.log(SideNav);

const CleariFixBtn = document.querySelector(".clearfix .btn");

CleariFixBtn.forEach((element) => {
    element.addEventListener("click", () => {
        if (SideNav.classList.contains("display")) {
            SideNav.classList.remove("display");
        } else {
            SideNav.classList.add("display");
        }
    });
});
