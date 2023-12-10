// jump to section
class JumpToSection {
  enable() {
    const BtnJts = document.querySelectorAll(".btn-jts");

    BtnJts.forEach((Btn) => {
      const target = Btn.dataset.target;
      const SectionTarget = document.querySelector(target);

      if (target && SectionTarget) {
        Btn.addEventListener("click", function () {
          SectionTarget.scrollIntoView({ behaviour: "smooth" });
        });
      }
    });
  }
}
