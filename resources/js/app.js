import "./bootstrap";

document.addEventListener("DOMContentLoaded", () => {
  const dismissAlert = (alertEl) => {
    alertEl.classList.add("opacity-0", "-translate-y-2");
    window.setTimeout(() => alertEl.remove(), 300);
  };

  document.querySelectorAll("[data-alert]").forEach((alertEl) => {
    const timeout = Number(alertEl.dataset.timeout || 5000);
    const progressEl = alertEl.querySelector(".js-alert-progress");
    const closeButton = alertEl.querySelector(".js-alert-close");

    if (progressEl) {
      progressEl.style.transition = `width ${timeout}ms linear`;
      requestAnimationFrame(() => {
        progressEl.style.width = "0%";
      });
    }

    if (closeButton) {
      closeButton.addEventListener("click", () => dismissAlert(alertEl));
    }

    window.setTimeout(() => dismissAlert(alertEl), timeout);
  });
});
