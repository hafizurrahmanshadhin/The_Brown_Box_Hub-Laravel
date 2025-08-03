document.addEventListener("DOMContentLoaded", function () {
  AOS.init({
    once: true,
    duration: 800,
  });

  // handle mobile sidebar
  const handleMobileSidebar = () => {
    const sidebar = document.querySelector(".mobile-sidebar");
    const overlay = document.querySelector(".sidebar-overlay");
    const menuToggle = document.querySelector(".menu-toggle");
    const sidebarClose = document.querySelector(".sidebar-close");

    if (sidebar && overlay && menuToggle && sidebarClose) {
      // Open Sidebar
      menuToggle.addEventListener("click", () => {
        sidebar.classList.add("active");
        overlay.classList.add("active");
        document.body.style.overflow = "hidden";
      });

      // Close Sidebar
      const closeSidebar = () => {
        sidebar.classList.remove("active");
        overlay.classList.remove("active");
        document.body.style.overflow = "";
      };

      sidebarClose.addEventListener("click", closeSidebar);
      overlay.addEventListener("click", closeSidebar);
    }
  };

  handleMobileSidebar();

  // handle upload file
  const handleFileUpload = () => {
    const fileInput = document.getElementById("file-input");
    const uploadTextElement = document.querySelector(".upload-file-text");

    if (fileInput && uploadTextElement) {
      fileInput.addEventListener("change", function () {
        const fileName = this.files[0]?.name || "No file selected";
        uploadTextElement.textContent = fileName;
        console.log("Selected file:", fileName);
      });
    }
  };

  handleFileUpload();

  // handle dashboard sidebar
  const dashboardSidebar = () => {
    const sidebar = document.getElementById("customSidebar");
    const sidebarToggle = document.getElementById("customSidebarToggle");

    if (sidebar && sidebarToggle) {
      sidebarToggle.addEventListener("click", () => {
        sidebar.classList.toggle("show");
      });
    }
  };

  dashboardSidebar();

  // handle video
  const handleVideo = () => {
    const customVideo = document.getElementById("customVideo");
    const customPlayIcon = document.getElementById("customPlayIcon");
    const customVideoThumbnail = document.getElementById(
      "customVideoThumbnail"
    );

    if (customVideo && customPlayIcon && customVideoThumbnail) {
      // Handle play button click
      customPlayIcon.addEventListener("click", () => {
        if (customVideo.paused) {
          customVideoThumbnail.style.display = "none";
          customVideo.style.display = "block";
          customVideo.play();
          customPlayIcon.style.display = "none";
        }
      });

      // Handle video click (toggle play/pause)
      customVideo.addEventListener("click", () => {
        if (!customVideo.paused) {
          customVideo.pause();
          customPlayIcon.style.display = "flex";
        } else {
          customPlayIcon.style.display = "none";
          customVideo.play();
        }
      });

      // Show play icon and thumbnail when the video ends
      customVideo.addEventListener("ended", () => {
        customVideoThumbnail.style.display = "block";
        customPlayIcon.style.display = "flex";
        customVideo.style.display = "none";
      });
    }
  };

  handleVideo();

  // handle plan steps
  const handlePlanSteps = () => {
    const nextBtn = document.getElementById("next-btn");
    const backBtn = document.getElementById("back-btn");

    if (nextBtn && backBtn) {
      let currentStep = 1;
      const totalSteps = 2;

      const showStep = (step) => {
        const allSteps = document.querySelectorAll(".form-step");
        allSteps.forEach((stepDiv, index) => {
          if (index + 1 === step) {
            stepDiv.classList.add("active");
          } else {
            stepDiv.classList.remove("active");
          }
        });
      };

      showStep(currentStep);

      nextBtn.addEventListener("click", () => {
        if (currentStep < totalSteps) {
          currentStep++;
          showStep(currentStep);
        }
      });

      backBtn.addEventListener("click", () => {
        if (currentStep > 1) {
          currentStep--;
          showStep(currentStep);
        }
      });
    }
  };

  handlePlanSteps();
});
