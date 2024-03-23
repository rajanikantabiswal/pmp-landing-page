<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link crossorigin="anonymous" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.3.2/swiper-bundle.css" rel="stylesheet" />
  <script crossorigin="anonymous" defer src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.3.2/swiper-bundle.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <style>
    .swiper-pagination {
      bottom: 0;
      position: relative;
    }

    .swiper-container {
      overflow: hidden;
    }

    .swiper-pagination-bullet {
      background-color: rgb(14 211 207);
    }

    .swiper-pagination-bullet-active {
      background-color: rgb(14 211 207);
    }
  </style>
</head>

<body class="">
  <!-- Button to open modal -->


  <!-- Modal -->
  <div class="overlay" id="overlay"></div>
  <div id="myModal" class="hidden fixed w-full h-full top-0 left-0 flex items-center justify-center" style="z-index: 999;">
    <!-- Modal content -->
    <div class="bg-white w-[90%] md:w-1/3 p-6 rounded-lg relative">
      <button class="absolute top-0 right-0 mt-4 me-6" onclick="closeModal()"><i class="fa-solid fa-x text-red-600 hover:scale-125 ease-in-out duration-300"></i></button>
      <!-- Form -->
      <h3 class="text-2xl font-bold text-center">Download Brochure</h3>
      <form id="myForm" action="downloadBrochure.php" method="POST" class="space-y-4 mt-2">
        <div class="flex flex-col">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required class="border rounded-md px-2 py-1">
        </div>
        <div class="flex flex-col">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required class="border rounded-md px-2 py-1">
        </div>
        <div class="flex flex-col">
          <label for="mobile">Mobile Number:</label>
          <input type="tel" id="mobile" name="mobile" maxlength="10" minlength="10" required class="border rounded-md px-2 py-1">
        </div>
        <button type="submit" class="w-full sm:w-1/2 md:w-1/3 bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i class="fa-solid fa-download pe-2"></i>Download</button>
      </form>
    </div>
  </div>

  <div id="ctaModal" class="hidden fixed w-full h-full top-0 left-0 flex items-center justify-center" style="z-index: 999;">
    <!-- Modal content -->
    <div class="bg-white w-[90%] md:w-1/3 p-6 rounded-lg relative">
      <button class="absolute top-0 right-0 mt-4 me-6" onclick="closeCtaModal()"><i class="fa-solid fa-x text-red-600 hover:scale-125 ease-in-out duration-300"></i></button>
      <!-- Form -->
      <h3 class="text-2xl font-bold text-center">Get In Touch</h3>
      <!-- <form id="myForm" action="downloadBrochure.php" method="POST" class="space-y-4 mt-2">
        <div class="flex flex-col">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required class="border rounded-md px-2 py-1">
        </div>
        <div class="flex flex-col">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required class="border rounded-md px-2 py-1">
        </div>
        <div class="flex flex-col">
          <label for="mobile">Mobile Number:</label>
          <input type="tel" id="mobile" name="mobile" maxlength="10" minlength="10" required class="border rounded-md px-2 py-1">
        </div>
        <button type="submit" class="w-full sm:w-1/2 md:w-1/3 bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i class="fa-solid fa-download pe-2"></i>Download</button>
      </form> -->

      <form action="cta.php" method="POST">
        <div class="flex flex-col">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required class="border rounded-md px-2 py-1">
        </div>
        <div class="grid grid-cols-2 gap-6 mt-4">
          <div>
            <div class="flex flex-col">
              <label for="email">Email:</label>
              <input type="email" id="email" name="email" required class="border rounded-md px-2 py-1">
            </div>
          </div>
          <div>
            <div class="flex flex-col">
              <label for="mobile">Mobile Number:</label>
              <input type="tel" id="mobile" name="mobile" maxlength="10" minlength="10" required class="border rounded-md px-2 py-1">
            </div>
          </div>
        </div>
        <div class="flex flex-col mt-4">
          <label for="message">Message:</label>
          <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-red-500 focus:border-red-500" placeholder="Leave a comment..."></textarea>
        </div>
        <button type="submit" class="w-full mt-4 bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i class="fa-brands fa-telegram pe-2"></i>Send Message</button>
      </form>
    </div>
  </div>

  <main class="">
    <div class="relative min-h-screen bg-cover" style="background-image: url('./assets/bg-home.jpg')">
      <!-- Background overlay -->
      <div class="absolute inset-0 bg-white opacity-[0.8] min-h-screen"></div>
      <div class="relative min-h-screen flex flex-wrap items-center px-4 md:px-0 md:pl-[100px]">
        <div class="left-content  lg:w-2/3 pt-8 md:text-left w-full z-50">
          <img src="./assets/logo.png" alt="" class="w-32 md:w-44">
          <h2 class="text-2xl md:text-[48px] leading-tight font-bold text-red-600 py-4">PMP<sup>®</sup>Certification Training
            Course</h2>
          <h4 class="font-bold text-[16px]">Leading premier PMI Partner globally</h4>
          <p class="my-2"><i class="fa-regular fa-circle-check pe-2 text-red-600 text-xl"></i>Lead, Innovate, Succeed and become a Project Management Professional today!</p>
          <p class="my-2"><i class="fa-regular fa-circle-check pe-2 text-red-600 text-xl"></i>Your passport to project success.</p>
          <p class="my-2"><i class="fa-regular fa-circle-check pe-2 text-red-600 text-xl"></i>Elevate your career with PMP<sup>®</sup> excellence.</p>
          <p class="my-2"><i class="fa-regular fa-circle-check pe-2 text-red-600 text-xl"></i>Leading projects, leading teams.</p>
          <p class="my-2"><i class="fa-regular fa-circle-check pe-2 text-red-600 text-xl"></i>Unlock your potential by powering your project management to hit the road.</p>
          <p class="my-2"><i class="fa-regular fa-circle-check pe-2 text-red-600 text-xl"></i>Build, Execute, Achieve and Make It Happen.</p>
          <p class="my-2"><i class="fa-regular fa-circle-check pe-2 text-red-600 text-xl"></i>Take the Lead, Make an Impact and your journey starts here.</p>
          <div class="mt-8 flex gap-4 flex-wrap justify-center md:justify-start">
            <a href="tel:+918338899965"><button class="bg-red-600 px-4 md:px-6 py-2 md:py-3 rounded text-white  w-full md:w-auto md:w-1/2"><i class="fa-solid fa-phone pe-2"></i>Contact Our Learning Advisor</button></a>
            <button class="openModalButton px text-red-600 font-semibold transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300 w-full md:w-auto md:w-1/2"><i class="fa-solid fa-download pe-2"></i>Download Brochure</button>
          </div>
        </div>
        <div class="lg:absolute bottom-0 md:right-0 lg:w-[45%]">
          <img src="./assets/model.png" alt="" class="object-cover pt-4">
        </div>
      </div>
    </div>

    <section class="py-16 px-4 md:px-[100px]">
      <h2 class="text-[22px] md:text-3xl font-bold border-s-[5px] border-red-600 pl-2">Cultivate Project Management Professional Training in Eureka learnings</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 grid-flow-row gap-6 mt-8">
        <div class="w-full h-full border-[1px] border-red-100 shadow-md  rounded-xl hover:bg-red-100 transition-all duration-300 flex flex-col justify-center items-center p-10 gap-6">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="70" height="70" color="" fill="none" class="text-red-600">
            <path d="M2 2H16C17.8856 2 18.8284 2 19.4142 2.58579C20 3.17157 20 4.11438 20 6V12C20 13.8856 20 14.8284 19.4142 15.4142C18.8284 16 17.8856 16 16 16H9" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M10 6.5H16" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M2 17V13C2 12.0572 2 11.5858 2.29289 11.2929C2.58579 11 3.05719 11 4 11H6M2 17H6M2 17V22M6 17V11M6 17V22M6 11H9H12" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M6 6.5C6 7.60457 5.10457 8.5 4 8.5C2.89543 8.5 2 7.60457 2 6.5C2 5.39543 2.89543 4.5 4 4.5C5.10457 4.5 6 5.39543 6 6.5Z" stroke="currentColor" stroke-width="1" />
          </svg>
          <span class="text-2xl text-center ">Expert Trainers</span>
        </div>

        <div class="w-full h-full border-[1px] border-red-100 shadow-md  rounded-xl hover:bg-red-100 transition-all duration-300 flex flex-col justify-center items-center p-10 gap-6">

          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="70" height="70" color="" fill="none" class="text-red-600">
            <path d="M11.0215 6.78662V19.7866" stroke="currentColor" stroke-width="1" stroke-linecap="round" />
            <path d="M11 19.5C10.7777 19.5 10.3235 19.2579 9.41526 18.7738C8.4921 18.2818 7.2167 17.7922 5.5825 17.4849C3.74929 17.1401 2.83268 16.9678 2.41634 16.4588C2 15.9499 2 15.1347 2 13.5044V7.09655C2 5.31353 2 4.42202 2.6487 3.87302C3.29741 3.32401 4.05911 3.46725 5.5825 3.75372C8.58958 4.3192 10.3818 5.50205 11 6.18114C11.6182 5.50205 13.4104 4.3192 16.4175 3.75372C17.9409 3.46725 18.7026 3.32401 19.3513 3.87302C20 4.42202 20 5.31353 20 7.09655V10" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M20.8638 12.9393L21.5589 13.6317C22.147 14.2174 22.147 15.1672 21.5589 15.7529L17.9171 19.4485C17.6306 19.7338 17.2642 19.9262 16.8659 20.0003L14.6088 20.4883C14.2524 20.5653 13.9351 20.2502 14.0114 19.895L14.4919 17.6598C14.5663 17.2631 14.7594 16.8981 15.0459 16.6128L18.734 12.9393C19.3222 12.3536 20.2757 12.3536 20.8638 12.9393Z" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <span class="text-2xl text-center ">Comprehensive Curriculum</span>
        </div>

        <div class="w-full h-full border-[1px] border-red-100 shadow-md  rounded-xl hover:bg-red-100 transition-all duration-300 flex flex-col justify-center items-center p-10 gap-6">

          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="70" height="70" color="" fill="none" class="text-red-600">
            <path d="M9 5C9 6.65685 7.65685 8 6 8C4.34315 8 3 6.65685 3 5C3 3.34315 4.34315 2 6 2C7.65685 2 9 3.34315 9 5Z" stroke="currentColor" stroke-width="1" />
            <path d="M21 5C21 6.65685 19.6569 8 18 8C16.3431 8 15 6.65685 15 5C15 3.34315 16.3431 2 18 2C19.6569 2 21 3.34315 21 5Z" stroke="currentColor" stroke-width="1" />
            <path d="M9 19C9 20.6569 7.65685 22 6 22C4.34315 22 3 20.6569 3 19C3 17.3431 4.34315 16 6 16C7.65685 16 9 17.3431 9 19Z" stroke="currentColor" stroke-width="1" />
            <path d="M6 16V8" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M18 8C18 8.93188 18 11.3978 17.8478 11.7654C17.6448 12.2554 17.2554 12.6448 16.7654 12.8478C16.3978 13 15.9319 13 15 13H9C8.06812 13 7.60218 13 7.23463 13.1522C6.74458 13.3552 6.35523 13.7446 6.15224 14.2346C6 14.6022 6 15.0681 6 16" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <span class="text-2xl text-center ">Flexibility</span>
        </div>

        <div class="w-full h-full border-[1px] border-red-100 shadow-md  rounded-xl hover:bg-red-100 transition-all duration-300 flex flex-col justify-center items-center p-10 gap-6">

          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="70" height="70" color="" fill="none" class="text-red-600">
            <path d="M12 9C10.8954 9 10 9.67157 10 10.5C10 11.3284 10.8954 12 12 12C13.1046 12 14 12.6716 14 13.5C14 14.3284 13.1046 15 12 15M12 9C12.8708 9 13.6116 9.4174 13.8862 10M12 9V8M12 15C11.1292 15 10.3884 14.5826 10.1138 14M12 15V16" stroke="currentColor" stroke-width="1" stroke-linecap="round" />
            <path d="M11.9982 2C8.99043 2 7.04018 4.01899 4.73371 4.7549C3.79589 5.05413 3.32697 5.20374 3.1372 5.41465C2.94743 5.62556 2.89186 5.93375 2.78072 6.55013C1.59143 13.146 4.1909 19.244 10.3903 21.6175C11.0564 21.8725 11.3894 22 12.0015 22C12.6135 22 12.9466 21.8725 13.6126 21.6175C19.8116 19.2439 22.4086 13.146 21.219 6.55013C21.1078 5.93364 21.0522 5.6254 20.8624 5.41449C20.6726 5.20358 20.2037 5.05405 19.2659 4.75499C16.9585 4.01915 15.0061 2 11.9982 2Z" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <span class="text-2xl text-center ">Cost Effective</span>
        </div>

        <div class="w-full h-full border-[1px] border-red-100 shadow-md  rounded-xl hover:bg-red-100 transition-all duration-300 flex flex-col justify-center items-center p-10 gap-6">

          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="70" height="70" color="" fill="none" class="text-red-600">
            <path d="M13 15C10.7083 21 4.29167 15 2 21" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M15.5 15H17.0013C19.3583 15 20.5368 15 21.2691 14.2678C22.0013 13.5355 22.0013 12.357 22.0013 10V8C22.0013 5.64298 22.0013 4.46447 21.2691 3.73223C20.5368 3 19.3583 3 17.0013 3H13.0013C10.6443 3 9.46576 3 8.73353 3.73223C8.11312 4.35264 8.01838 5.29344 8.00391 7" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
            <circle cx="7.5" cy="12.5" r="2.5" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M12 7H18M18 11H15" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <span class="text-2xl text-center ">Personal Coaching</span>
        </div>

      </div>
    </section>

    <section class="py-16 px-4 md:px-[100px] bg-gray-100">
      <div class="flex flex-wrap md:flex-nowrap gap-10 items-start relative">
        <div class="w-full lg:w-[70%]">
          <h2 class="text-[22px] md:text-3xl font-bold border-s-[5px] border-red-600 pl-2">Course Overview</h2>
          <p class="mt-3">Project Management Professional (PMP<sup>®</sup>) Certification is regarded as the premium program of all project management certifications across the industry. This course is recognised across the globe and the demand for the same is increasing rapidly. As Project Management Professionals are always required, the market equilibrium leads to a very handsome pay scale for certified project managers.</p>

          <p class="mt-3">The PMP<sup>®</sup> certification exam is considered one of the most difficult examinations to crack in
            the world, it requires guidance by an expert, rigorous self-studies, patience, consistency and adequate
            knowledge of the course. The PMP<sup>®</sup> certification training is offered by the Project Management Institute (PMI)
            which is also the governing body of the PMP<sup>®</sup> certification and Eureka Learnings is the Authorised Training
            Partner (ATP) of the PMI.</p>

          <p class="mt-3">The PMP<sup>®</sup> acknowledges candidates skilled at managing the people, processes, and business
            priorities of professional projects. PMI, the world’s leading authority on project management, created the
            PMP<sup>®</sup> to recognize project managers who have proven they have project leadership experience and expertise in
            any way of working.</p>

          <h2 class="text-[22px] md:text-3xl font-bold border-s-[5px] border-red-600 pl-2 mt-10">Objectives</h2>
          <p class="m-4">At the end of this course you will be able to:</p>
          <div class=" px-4 md:px-8">
            <p class="mb-4"><i class="fa-solid fa-check pe-2 text-red-600 text-xl"></i>Understand the basics of Project
              Management</p>
            <p class="mb-4"><i class="fa-solid fa-check pe-2 text-red-600 text-xl"></i>Know the basics of Project
              Management Framework</p>
            <p class="mb-4"><i class="fa-solid fa-check pe-2 text-red-600 text-xl"></i>Understand the Roles &
              Responsibility in different Project Management approaches</p>
            <p class="mb-4"><i class="fa-solid fa-check pe-2 text-red-600 text-xl"></i>Know the Major Process domain</p>
            <p class="mb-4"><i class="fa-solid fa-check pe-2 text-red-600 text-xl"></i>Know the Major People domain</p>
            <p class="mb-4"><i class="fa-solid fa-check pe-2 text-red-600 text-xl"></i>Understand Business environment
              domain</p>
            <p class="mb-4"><i class="fa-solid fa-check pe-2 text-red-600 text-xl"></i>Know the PMI Code pf Ethics &
              Professional Conduct</p>
          </div>

          <h2 class="text-[22px] md:text-3xl font-bold border-s-[5px] border-red-600 pl-2 mt-10">Training Options</h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 mt-6 gap-10 w-full md:w-[80%] items-top">
            <div class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105">
              <div class="p-1 bg-red-200">
              </div>
              <div class="flex flex-col justify-between h-full">
                <div class="pt-8 px-8">
                  <h2 class="text-2xl font-semibold text-gray-800 mb-4">Training Only</h2>
                  <!-- <p class="text-gray-600 mb-6">Ideal for small businesses</p> -->
                  <p class="text-4xl font-bold text-gray-800 mb-6">₹19,999</p>
                  <div>
                    <p class="mb-4 text-[14px]"><i class="fa-solid fa-check pe-2 text-red-600"></i>An extensive training of 36 Hours ( 4 Days Fulltime )</p>
                    <p class="mb-4 text-[14px]"><i class="fa-solid fa-check pe-2 text-red-600"></i>Training material</p>

                    <p class="mb-4 text-[14px]"><i class="fa-solid fa-check pe-2 text-red-600"></i>PDU certificate</p>
                    <p class="mb-4 text-[14px]"><i class="fa-solid fa-check pe-2 text-red-600"></i>Pre & Post Training Assesment</p>
                  </div>
                </div>
                <div class="p-4">
                  <a href="https://wa.me/918338899965?text=Hello%20there!" target="_blank"><button class="w-full bg-red-600 text-white rounded-full px-4 py-2 hover:bg-red-700 focus:outline-none focus:shadow-outline-blue active:bg-red-800">
                      Ask Our Experts
                    </button></a>
                </div>
              </div>
            </div>
            <div class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105">
              <div class="p-1 bg-red-200">
              </div>
              <div class="flex flex-col justify-between h-full">
                <div class="pt-8 px-8">
                  <h2 class="text-2xl font-semibold text-gray-800 mb-4">Training & Certification</h2>
                  <!-- <p class="text-gray-600 mb-6">Ideal for small businesses</p> -->
                  <p class="text-4xl font-bold text-gray-800 mb-6">₹29,999</p>
                  <div>
                    <p class="mb-4 text-[14px]"><i class="fa-solid fa-check pe-2 text-red-600"></i>An extensive training of 36 Hours ( 4 Days Fulltime )</p>
                    <p class="mb-4 text-[14px]"><i class="fa-solid fa-check pe-2 text-red-600"></i>Training material</p>

                    <p class="mb-4 text-[14px]"><i class="fa-solid fa-check pe-2 text-red-600"></i>PDU certificate</p>
                    <p class="mb-4 text-[14px]"><i class="fa-solid fa-check pe-2 text-red-600"></i>Personal mentoring to clear certification in One attempt
                    </p>
                    <p class="mb-4 text-[14px]"><i class="fa-solid fa-check pe-2 text-red-600"></i>Discounted Certification voucher
                    </p>
                    <p class="mb-4 text-[14px]"><i class="fa-solid fa-check pe-2 text-red-600"></i>Certification guidance
                    </p>
                    <p class="mb-4 text-[14px]"><i class="fa-solid fa-check pe-2 text-red-600"></i>Pre & Post Training Assesment</p>
                  </div>
                </div>
                <div class="p-4">
                  <a href="https://wa.me/918338899965?text=Hello%20there!" target="_blank"><button class="w-full bg-red-600 text-white rounded-full px-4 py-2 hover:bg-red-700 focus:outline-none focus:shadow-outline-blue active:bg-red-800">
                      Ask Our Experts
                    </button></a>
                </div>
              </div>
            </div>
          </div>



          <!-- component -->

          <h2 class="text-[22px] md:text-3xl font-bold border-s-[5px] border-red-600 pl-2 mt-10">Course Curriculum</h2>
          <div>
            <div class="grid divide-y divide-neutral-200 mx-auto mt-8">
              <div class="pb-5">
                <details class="group">
                  <summary class="flex justify-between items-left font-medium cursor-pointer list-none">
                    <span> Introduction to PMP<sup>®</sup></span>
                    <span class="transition group-open:rotate-180">
                      <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" width="24">
                        <path d="M6 9l6 6 6-6"></path>
                      </svg>
                    </span>
                  </summary>
                  <!-- <p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
					 SAAS platform is a cloud-based software service that allows users to access
					and use a variety of tools and functionality.
				</p> -->
                  <!-- component -->
                  <!-- Created By Joker Banny -->
                  <div class="flex mt-4 px-8">
                    <!-- <div class="space-y-6 border-l-2 border-dashed">
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-bold text-red-600">Introduction to PMP<sup>®</sup></h4>
                          <p class="mt-2 max-w-screen-sm text-sm text-gray-500">Maecenas finibus nec sem ut imperdiet.
                            Ut tincidunt est ac dolor aliquam sodales. Phasellus sed mauris hendrerit, laoreet sem in,
                            lobortis ante.</p>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-bold text-red-600">Introduction to PMP<sup>®</sup></h4>
                          <p class="mt-2 max-w-screen-sm text-sm text-gray-500">Maecenas finibus nec sem ut imperdiet.
                            Ut tincidunt est ac dolor aliquam sodales. Phasellus sed mauris hendrerit, laoreet sem in,
                            lobortis ante.</p>
                        </div>
                      </div>


                    </div> -->
                    <p class="mt-2 max-w-screen-sm text-sm text-gray-500">Welcome to the journey of unlocking the potential within you and transform into a globally recognized Project Management Professional. The PMP<sup>®</sup> (Project Management Professional) certification, issued by the Project Management Institute (PMI), is a globally recognized credential that signifies an individual’s proficiency in managing projects using PMI’s framework.</p>
                  </div>


                </details>
              </div>

              <div class="py-5">
                <details class="group">
                  <summary class="flex justify-between items-left font-medium cursor-pointer list-none">
                    <span class="flex">
                      <h3 class="me-2 text-red-600">Domain-I</h3> Manage People
                    </span>
                    <span class="transition group-open:rotate-180">
                      <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" width="24">
                        <path d="M6 9l6 6 6-6"></path>
                      </svg>
                    </span>
                  </summary>
                  <div class="flex mt-4 px-8">
                    <div class="space-y-6 border-l-2 border-dashed">
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 1: Manage conflict</h4>
                          <ul class="mt-2 text-gray-500 list-disc">
                            <li>Interpret the source and stage of the conflict</li>
                            <li>Analyze the context for the conflict</li>
                            <li>Evaluate/recommend/reconcile the appropriate conflict resolution solution</li>

                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 2: Lead a team</h4>
                          <ul class="mt-2 text-gray-500 list-disc">
                            <li>Set a clear vision and mission</li>
                            <li>Support diversity and inclusion (e.g., behavior types, thought process)</li>
                            <li>Value servant leadership (e.g., relate the tenets of servant leadership to the team)</li>
                            <li>Determine an appropriate leadership style (e.g., directive, collaborative)</li>
                            <li>Inspire, motivate, and influence team members/stakeholders (e.g., team contract,
                              social contract, reward system)</li>
                            <li>Analyze team members and stakeholders’ influence</li>
                            <li>Distinguish various options to lead various team members and stakeholders</li>

                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 3: Support team performance</h4>
                          <ul class="mt-2 text-gray-500 list-disc">
                            <li>Appraise team member performance against key performance indicators</li>
                            <li>Support and recognize team member growth and development</li>
                            <li>Determine appropriate feedback approach
                            </li>
                            <li>Verify performance improvements
                            </li>

                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 4: Empower team members and stakeholders</h4>
                          <ul class="mt-2 text-gray-500 list-disc">
                            <li>Organize around team strengths</li>
                            <li>Support team task accountability</li>
                            <li>Evaluate demonstration of task accountability
                            </li>
                            <li>Determine and bestow level(s) of decision-making authority
                            </li>

                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 5: Ensure team members/stakeholders are adequately trained</h4>
                          <ul class="mt-2 text-gray-500 list-disc">
                            <li>Determine required competencies and elements of training</li>
                            <li>Determine training options based on training needs</li>
                            <li>Allocate resources for training
                            </li>
                            <li>Measure training outcomes
                            </li>

                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 6: Build a team</h4>
                          <ul class="mt-2 text-gray-500 list-disc">
                            <li>Appraise stakeholder skills</li>
                            <li>Deduce project resource requirements
                            </li>
                            <li>Continuously assess and refresh team skills to meet project needs
                            </li>
                            <li>Maintain team and knowledge transfer
                            </li>

                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 7: Address and remove impediments, obstacles, and blockers for the team</h4>
                          <ul class="mt-2 text-gray-500 list-disc">
                            <li>Determine critical impediments, obstacles, and blockers for the team</li>
                            <li>Prioritize critical impediments, obstacles, and blockers for the team
                            </li>
                            <li>Use network to implement solutions to remove impediments, obstacles, and
                              blockers for the team
                            </li>
                            <li>Re-assess continually to ensure impediments, obstacles, and blockers for the team
                              are being addressed
                            </li>

                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 8: Negotiate project agreements</h4>
                          <ul class="mt-2 text-gray-500 list-disc">
                            <li>Analyze the bounds of the negotiations for agreement</li>
                            <li>Assess priorities and determine ultimate objective(s)
                            </li>
                            <li>Verify objective(s) of the project agreement is met
                            </li>
                            <li>Participate in agreement negotiations
                            </li>
                            <li>Determine a negotiation strategy
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 9: Collaborate with stakeholders</h4>
                          <ul class="mt-2 text-gray-500 list-disc">
                            <li>Evaluate engagement needs for stakeholders</li>
                            <li>Optimize alignment between stakeholder needs, expectations, and project objectives</li>
                            <li>Build trust and influence stakeholders to accomplish project objectives</li>
                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 10: Build shared understanding</h4>
                          <ul class="mt-2 text-gray-500 list-disc">
                            <li>Break down situation to identify the root cause of a misunderstanding</li>
                            <li>Survey all necessary parties to reach consensus</li>
                            <li>Support outcome of parties' agreement</li>
                            <li>Investigate potential misunderstandings</li>
                          </ul>
                        </div>
                      </div>

                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 11: Engage and support virtual teams</h4>
                          <ul class="mt-2 text-gray-500 list-disc">
                            <li>Examine virtual team member needs (e.g., environment, geography, culture, global, etc.)</li>
                            <li>Investigate alternatives (e.g., communication tools, colocation) for virtual team member engagement</li>
                            <li>Implement options for virtual team member engagement</li>
                            <li>Continually evaluate effectiveness of virtual team member engagement</li>
                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 12: Define team ground rules</h4>
                          <ul class="mt-2 text-gray-500 list-disc">
                            <li>Communicate organizational principles with team and external stakeholders</li>
                            <li>Establish an environment that fosters adherence to the ground rules</li>
                            <li>Manage and rectify ground rule violations</li>
                          </ul>
                        </div>
                      </div>

                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 13: Mentor relevant stakeholders</h4>
                          <ul class="mt-2 text-gray-500 list-disc">
                            <li>Allocate the time to mentoring</li>
                            <li>Recognize and act on mentoring opportunities
                            </li>

                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 14: Promote team performance through the application of emotional intelligence</h4>
                          <ul class="mt-2 text-gray-500 list-disc">
                            <li>Assess behavior through the use of personality indicators</li>
                            <li>Analyze personality indicators and adjust to the emotional needs of key project
                              stakeholders
                            </li>

                          </ul>
                        </div>
                      </div>



                    </div>
                  </div>
                </details>
              </div>
              <div class="py-5">
                <details class="group">
                  <summary class="flex justify-between items-left font-medium cursor-pointer list-none">
                    <span class="flex">
                      <h3 class="me-2 text-red-600">Domain-II</h3> Manage Process
                    </span>
                    <span class="transition group-open:rotate-180">
                      <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" width="24">
                        <path d="M6 9l6 6 6-6"></path>
                      </svg>
                    </span>
                  </summary>
                  <div class="flex mt-4 px-8">
                    <div class="space-y-6 border-l-2 border-dashed">
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 1: Execute project with the urgency required to deliver business value</h4>
                          <ul class="mt-2 text-gray-500 list-disc">
                            <li>Assess opportunities to deliver value incrementally.</li>
                            <li>Examine the business value throughout the project.</li>
                            <li>Support the team to subdivide project tasks as necessary to find the minimum viable product.</li>

                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 2: Manage communications</h4>
                          <ul class="mt-2 text-gray-500 list-disc">
                            <li>Analyze communication needs of all stakeholders.</li>
                            <li>Determine communication methods, channels, frequency, and level of detail for all stakeholders.</li>
                            <li>Communicate project information and updates effectively.</li>
                            <li>Confirm communication is understood and feedback is received.</li>

                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 3: Assess and manage risks</h4>
                          <ul class="mt-2 text-gray-500 list-disc">
                            <li>Determine risk management options.</li>
                            <li>Iteratively assess and prioritize risks.</li>

                          </ul>
                        </div>
                      </div>

                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 4: Engage stakeholders</h4>
                          <ul class="mt-2 text-gray-500 list-disc">

                            <li>Analyze stakeholders (e.g., power interest grid, influence, impact).</li>
                            <li>Categorize stakeholders.</li>
                            <li>Engage stakeholders by category.</li>
                            <li>Develop, execute, and validate a strategy for stakeholder engagement.</li>

                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 5: Plan and manage budget and resources</h4>
                          <ul class="mt-2 text-gray-500 list-disc">

                            <li>Estimate budgetary needs based on the scope of the project and lessons learned from past projects.</li>
                            <li>Anticipate future budget challenges.</li>
                            <li>Monitor budget variations and work with governance process to adjust as necessary.</li>
                            <li>Plan and manage resources.</li>

                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 6: Plan and manage schedule</h4>
                          <ul class="mt-2 text-gray-500 list-disc">

                            <li>Estimate project tasks (milestones, dependencies, story points).</li>
                            <li>Utilize benchmarks and historical data.</li>
                            <li>Prepare schedule based on methodology.</li>
                            <li>Measure ongoing progress based on methodology.</li>
                            <li>Modify schedule, as needed, based on methodology.</li>
                            <li>Coordinate with other projects and other operations.</li>

                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 7: Plan and manage quality of products/deliverables</h4>
                          <ul class="mt-2 text-gray-500 list-disc">

                            <li>Determine quality standard required for project deliverables.</li>
                            <li>Recommend options for improvement based on quality gaps.</li>
                            <li>Continually survey project deliverable quality.</li>

                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 8: Plan and manage scope</h4>
                          <ul class="mt-2 text-gray-500 list-disc">

                            <li>Determine and prioritize requirements.</li>
                            <li>Break down scope (e.g., WBS, backlog).</li>
                            <li>Monitor and validate scope.</li>

                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 9: Integrate project planning activities</h4>
                          <ul class="mt-2 text-gray-500 list-disc">

                            <li>Consolidate the project/phase plans.</li>
                            <li>Assess consolidated project plans for dependencies, gaps, and continued business value.</li>
                            <li>Analyze the data collected.</li>
                            <li>Collect and analyze data to make informed project decisions.</li>
                            <li>Determine critical information requirements.</li>

                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 10: Manage project changes</h4>
                          <ul class="mt-2 text-gray-500 list-disc">

                            <li>Anticipate and embrace the need for change (e.g., follow change management practices).</li>
                            <li>Determine strategy to handle change.</li>
                            <li>Execute change management strategy according to the methodology.</li>
                            <li>Determine a change response to move the project forward.</li>

                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 11: Plan and manage procurement</h4>
                          <ul class="mt-2 text-gray-500 list-disc">

                            <li>Define resource requirements and needs.</li>
                            <li>Communicate resource requirements.</li>
                            <li>Manage suppliers/contracts.</li>
                            <li>Plan and manage procurement strategy.</li>
                            <li>Develop a delivery solution.</li>

                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 12: Manage project artifacts</h4>
                          <ul class="mt-2 text-gray-500 list-disc">

                            <li>Determine the requirements (what, when, where, who, etc.) for managing the project artifacts.</li>
                            <li>Validate that the project information is kept up to date (i.e., version control) and accessible to all stakeholders.</li>
                            <li>Continually assess the effectiveness of the management of the project artifacts.</li>

                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 13: Determine appropriate project methodology/methods and practices
                          </h4>
                          <ul class="mt-2 text-gray-500 list-disc">

                            <li>Assess project needs, complexity, and magnitude.</li>
                            <li>Recommend project execution strategy (e.g., contracting, finance).</li>
                            <li>Recommend a project methodology/approach (i.e., predictive, agile, hybrid).</li>
                            <li>Use iterative, incremental practices throughout the project life cycle (e.g., lessons learned, stakeholder engagement, risk).</li>

                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 14: Establish project governance structure
                          </h4>
                          <ul class="mt-2 text-gray-500 list-disc">

                            <li>Determine appropriate governance for a project (e.g., replicate organizational governance).</li>
                            <li>Define escalation paths and thresholds.</li>

                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 15: Manage project issues
                          </h4>
                          <ul class="mt-2 text-gray-500 list-disc">

                            <li>Recognize when a risk becomes an issue.</li>
                            <li>Take the optimal action to resolve the issue and achieve project success.</li>
                            <li>Collaborate with relevant stakeholders on the approach to resolve the issues.</li>

                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 16: Ensure knowledge transfer for project continuity
                          </h4>
                          <ul class="mt-2 text-gray-500 list-disc">

                            <li>Discuss project responsibilities within the team.</li>
                            <li>Outline expectations for the working environment.</li>
                            <li>Confirm approach for knowledge transfers.</li>
                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 17: Plan and manage project/phase closure or transitions
                          </h4>
                          <ul class="mt-2 text-gray-500 list-disc">

                            <li>Determine criteria to successfully close the project or phase.</li>
                            <li>Validate readiness for transition (e.g., to operations team or next phase).</li>
                            <li>Conclude activities to close out project or phase (e.g., final lessons learned, retrospective, procurement, financials, resources).</li>
                          </ul>
                        </div>
                      </div>


                    </div>
                  </div>
                </details>
              </div>
              <div class="py-5">
                <details class="group">
                  <summary class="flex justify-between items-left font-medium cursor-pointer list-none">
                    <span class="flex">
                      <h3 class="me-2 text-red-600">Domain-III</h3> Manage Business Environment
                    </span>
                    <span class="transition group-open:rotate-180">
                      <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" width="24">
                        <path d="M6 9l6 6 6-6"></path>
                      </svg>
                    </span>
                  </summary>
                  <div class="flex mt-4 px-8">
                    <div class="space-y-6 border-l-2 border-dashed">
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 1: Plan and manage project compliance</h4>
                          <ul class="mt-2 text-gray-500 list-disc">
                            <li>Confirm project compliance requirements (e.g., security, health and safety, regulatory compliance).</li>
                            <li>Classify compliance categories.</li>
                            <li>Determine potential threats to compliance.</li>
                            <li>Use methods to support compliance.</li>
                            <li>Analyze the consequences of noncompliance.</li>
                            <li>Determine necessary approach and action to address compliance needs (e.g., risk, legal).</li>
                            <li>Measure the extent to which the project is in compliance.</li>

                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 2: Evaluate and deliver project benefits and value</h4>
                          <ul class="mt-2 text-gray-500 list-disc">
                            <li>Investigate that benefits are identified</li>
                            <li>Document agreement on ownership for ongoing benefit realization</li>
                            <li>Verify measurement system is in place to track benefits</li>
                            <li>Evaluate delivery options to demonstrate value</li>
                            <li>Appraise stakeholders of value gain progress</li>

                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 3: Evaluate and address external business environment changes for impact on
                            scope</h4>
                          <ul class="mt-2 text-gray-500 list-disc">
                            <li>Survey changes to external business environment (e.g., regulations, technology, geopolitical, market).</li>
                            <li>Assess and prioritize the impact on project scope/backlog based on changes in the external business environment.</li>
                            <li>Recommend options for scope/backlog changes (e.g., schedule, cost changes).</li>
                            <li>Continually review the external business environment for impacts on project scope/backlog.</li>

                          </ul>
                        </div>
                      </div>
                      <div class="relative w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-red-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-6">
                          <h4 class="font-semibold">Task 4: Support organizational change</h4>
                          <ul class="mt-2 text-gray-500 list-disc">
                            <li>Assess organizational culture</li>
                            <li>Evaluate impact of organizational change to project and determine required actions.</li>
                            <li>Evaluate impact of the project to the organization and determine required actions.</li>

                          </ul>
                        </div>
                      </div>



                    </div>
                  </div>
                </details>
              </div>
            </div>
            <div class="pt-4 flex justify-center md:justify-start">
              <button class="openModalButton text-red-600 font-bold border-2 border-solid border-red-600 px-6 py-3 rounded-md hover:bg-red-600 hover:text-white transition-all duration-300">Download
                Brochure</button>
            </div>
          </div>

          <script>
            // ...
            // extend: {
            //   keyframes: {
            //     fadeIn: {
            //       "0%": { opacity: 0 },
            //       "100%": { opacity: 100 },
            //     },
            //   },
            //   animation: {
            //     fadeIn: "fadeIn 0.2s ease-in-out forwards",
            //   },
            // },
            // ...
          </script>
        </div>
        <div class="w-full md:w-[30%]" style="position: sticky; top: 40px;">
          <div class="shadow-md flex flex-grow !flex-row flex-col items-center rounded-[10px] rounded-[10px] border-[1px] border-gray-200 bg-white bg-clip-border shadow-md shadow-[#F3F3F3] ">
            <div class="bg-red-200 w-[50px] h-[50px] rounded-full flex justify-center items-center my-4 ml-4">
              <i class="fa-solid fa-phone text-xl text-red-600"></i>
            </div>
            <div class="h-50 ml-4 flex w-auto flex-col justify-center">
              <p class="font-dm text-sm font-medium text-gray-600">Call Now</p>
              <h4 class="text-xl font-bold text-red-600">+91 8338899965</h4>
            </div>
          </div>
          <form class="bg-white shadow-mdshadow-[#F3F3F3] rounded-[10px] px-8 pt-6 pb-8 mt-4" action="getInTouch.php" method="POST">
            <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Name
              </label>
              <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Enter your name" name="name" required>
            </div>
            <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                Email Address
              </label>
              <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Enter your email address" name="email" required>
            </div>
            <div class="mb-6">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                Phone Number
              </label>
              <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone" type="tel" placeholder="Enter your phone number" name="mobile" maxlength="10" minlength="10" required>
            </div>
            <div class="flex items-center justify-between">
              <button class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                GET IN TOUCH
              </button>
            </div>
          </form>

          <?php

          if (isset($_SESSION['status'])) {
          ?>
            <div class="flex justify-center alertBox">
              <div class="grid min-h-[140px] w-full place-items-center overflow-x-scroll rounded-lg p-2 lg:overflow-visible">
                <div role="alert" class="relative block w-full text-base font-regular px-4 py-4 rounded-lg bg-green-200 text-white flex">
                  <div class=" mr-12">
                    <p class="font-bold text-black">
                      🌟 <?php
                          echo $_SESSION['status'];
                          ?>
                    </p>
                  </div>
                  <button onclick="removeAlert()" class="relative align-middle select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-8 max-w-[32px] h-8 max-h-[32px] rounded-lg text-xs text-white hover:bg-white/10 active:bg-white/30 !absolute top-3 right-3" type="button">
                    <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                      </svg>
                    </span>
                  </button>
                </div>
              </div>
            </div>
          <?php
          }
          ?>



        </div>
      </div>
    </section>

    <section class="px-4 md:px-[100px] py-16">
      <h2 class="text-[22px] md:text-3xl font-bold border-s-[5px] border-red-600 pl-2">PMP<sup>®</sup> Exam & Certification</h2>
      <div class="flex flex-wrap justify-between items-center">
        <div class="w-full md:w-[60%]">

          <div class="grid divide-y divide-neutral-200 mx-auto mt-8">

            <div class="pb-5">
              <details class="group">
                <summary class="flex justify-between items-left font-medium cursor-pointer list-none">
                  <span> What is the PMP<sup>®</sup> certification and why is it important?</span>
                  <span class="transition group-open:rotate-180">
                    <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" width="24">
                      <path d="M6 9l6 6 6-6"></path>
                    </svg>
                  </span>
                </summary>
                <p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                  The Project Management Professional (PMP<sup>®</sup>) certification is a globally recognized credential awarded by
                  the Project Management Institute (PMI). It signifies that an individual has demonstrated the
                  knowledge, skills, and experience required to successfully lead and manage projects. PMP<sup>®</sup> certification
                  is important as it enhances your credibility, validates your expertise, and opens up career
                  opportunities in project management across various industries worldwide.
                </p>

              </details>
            </div>
            <div class="py-5">
              <details class="group">
                <summary class="flex justify-between items-left font-medium cursor-pointer list-none">
                  <span> How do I qualify to take the PMP<sup>®</sup> exam?
                  </span>
                  <span class="transition group-open:rotate-180">
                    <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" width="24">
                      <path d="M6 9l6 6 6-6"></path>
                    </svg>
                  </span>
                </summary>
                <p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                  To qualify for the PMP<sup>®</sup> exam, you need to meet specific eligibility criteria outlined by PMI. This
                  typically includes a combination of education and project management experience. As of PMI’s
                  requirements, candidates must have a minimum of a secondary degree (high school diploma, associate’s
                  degree, or global equivalent) along with 7,500 hours leading and directing projects, or a four-year
                  degree with 4,500 hours leading and directing projects. Additionally, you must complete 35 hours of
                  formal project management education.
                </p>

              </details>
            </div>
            <div class="py-5">
              <details class="group">
                <summary class="flex justify-between items-left font-medium cursor-pointer list-none">
                  <span> What are the benefits of obtaining PMP<sup>®</sup> certification for my career?</span>
                  <span class="transition group-open:rotate-180">
                    <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" width="24">
                      <path d="M6 9l6 6 6-6"></path>
                    </svg>
                  </span>
                </summary>
                <p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                  PMP<sup>®</sup> certification offers numerous benefits for your career advancement. It enhances your
                  marketability, increases your earning potential, and improves your job prospects by demonstrating your
                  commitment to excellence in project management. PMP<sup>®</sup> certification also provides you with a globally
                  recognized credential that signifies your competency and proficiency in leading and managing projects,
                  thereby opening doors to new opportunities and career growth.
                </p>

              </details>
            </div>
            <div class="py-5">
              <details class="group">
                <summary class="flex justify-between items-left font-medium cursor-pointer list-none">
                  <span> How can I prepare for the PMP<sup>®</sup> exam effectively?</span>
                  <span class="transition group-open:rotate-180">
                    <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" width="24">
                      <path d="M6 9l6 6 6-6"></path>
                    </svg>
                  </span>
                </summary>
                <p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                  Effective preparation for the PMP<sup>®</sup> exam involves a combination of studying the PMBOK Guide (Project
                  Management Body of Knowledge), practicing with sample questions and mock exams, and participating in
                  PMP<sup>®</sup> exam prep courses or study groups. It’s essential to create a study plan, focus on understanding
                  the exam content domains, and regularly assess your progress through practice exams. Additionally,
                  leveraging study resources such as books, online courses, and exam simulators can further enhance your
                  preparation and increase your chances of success.
                </p>

              </details>
            </div>
            <div class="py-5">
              <details class="group">
                <summary class="flex justify-between items-left font-medium cursor-pointer list-none">
                  <span> What are the renewal requirements for maintaining PMP<sup>®</sup> certification?</span>
                  <span class="transition group-open:rotate-180">
                    <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" width="24">
                      <path d="M6 9l6 6 6-6"></path>
                    </svg>
                  </span>
                </summary>
                <p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                  PMP<sup>®</sup> certification is valid for three years from the date you pass the exam. To maintain your
                  certification, you must earn 60 Professional Development Units (PDUs) within each three-year
                  certification cycle. PDUs can be earned through various professional development activities such as
                  attending workshops, conferences, webinars, and training sessions related to project management.
                  Additionally, you have the option to retake the PMP<sup>®</sup> exam or pursue advanced certifications offered by
                  PMI to renew your PMP<sup>®</sup> certification.
                </p>

              </details>
            </div>

          </div>
        </div>


        <div class="w-full md:w-[35%] flex items-center justify-center mt-8"><img src="./assets/certificate.png" alt="" class="sm:w-2/3 md:w-full"></div>
      </div>
    </section>
    <section class="px-4 md:px-[100px] py-16 bg-gray-100">
      <h2 class="text-[22px] md:text-3xl font-bold border-s-[5px] border-red-600 pl-2">PMP<sup>®</sup> Training Course Advisor</h2>
      <div class="flex flex-wrap">
        <div class="w-full md:w-2/5">

          <div class="flex flex-col sm:flex-row md:flex-col mr-5 text-center mb-11 lg:mr-16 mt-4 py-8 justify-center gap-10">
            <div class="inline-block mb-4 relative shrink-0 rounded-[.95rem]">
              <img class="inline-block shrink-0 rounded-[.95rem] w-[200px] h-[200px]" src="./assets/akraj.png" alt="avarat image">
            </div>
            <div class="flex flex-col justify-center">
              <div class="text-center">
                <a href="javascript:void(0)" class="text-dark font-bold hover:text-primary text-[1.5rem] transition-colors duration-200 ease-in-out">Ashwini
                  Kr. Raj</a>
                <span class="block font-medium text-muted">Learning Advisor</span>
              </div>

              <div class="mt-6 lg:mb-0 mb-6">
                <button class="bg-white text-lightBlue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                  <i class="fab fa-twitter"></i></button><button class="bg-white text-lightBlue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                  <i class="fab fa-facebook-square"></i></button><button class="bg-white text-pink-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                  <i class="fab fa-dribbble"></i></button><button class="bg-white text-blueGray-800 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                  <i class="fab fa-github"></i>
                </button>
              </div>
            </div>

          </div>
        </div>
        <div class="w-full md:w-3/5 flex flex-col justify-center">
          <p><span class="font-bold">Having 25 Years of exposure in the IT and Education industry, Ashwini has grown with a Multi-faceted career in Account Management, Delivery, Operation, Program Management and Training.</p>
          <p class="mt-4">He has proven his leadership abilities across multiple teams with technical expertise and provided his vision to various leadership & technology for the Corporates along with Academia. Being an award winner for Sales, he is continuing his delivery and gaining professional achievements at the organizational higher version.</p>

          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 p-8 bg-gray-200 my-6 rounded-lg gap-4">
            <div class="text-lg">
              <i class="fa-solid fa-award text-red-600 me-2"></i>
              <span>PHD</span>
            </div>
            <div class="text-lg">
              <i class="fa-solid fa-award text-red-600 me-2"></i>
              <span>PMP<sup>®</sup></span>
            </div>
            <div class="text-lg">
              <i class="fa-solid fa-award text-red-600 me-2"></i>
              <span>Salesforce accredited Career Guide</span>
            </div>
            <div class="text-lg">
              <i class="fa-solid fa-award text-red-600 me-2"></i>
              <span>M.Sc. (IT)</span>
            </div>
            <div class="text-lg">
              <i class="fa-solid fa-award text-red-600 me-2"></i>
              <span>Salesforce accredited career Guide</span>
            </div>
            <div class="text-lg">
              <i class="fa-solid fa-award text-red-600 me-2"></i>
              <span>DISC certified consultant</span>
            </div>
            <div class="text-lg">
              <i class="fa-solid fa-award text-red-600 me-2"></i>
              <span>MBA</span>
            </div>
            <div class="text-lg">
              <i class="fa-solid fa-award text-red-600 me-2"></i>
              <span>Salesforce Trailblazer Marketer group leader, Ghaziabad, IN</span>
            </div>
            <div class="text-lg">
              <i class="fa-solid fa-award text-red-600 me-2"></i>
              <span>NLP Practitioner</span>
            </div>
          </div>
        </div>
      </div>

    </section>

    <section class="px-4 md:px-[100px] py-16">
      <h2 class="text-[22px] md:text-3xl font-bold border-s-[5px] border-red-600 pl-2">Our Testimonials</h2>

      <!-- <div class=" relative flex justify-center items-center">
        <div class="swiper mySwiper w-[260px] h-[320px]">
          <div class="swiper-wrapper">


            <div class="swiper-slide bg-[#008CFF] flex items-center justify-center rounded-[18px] text-[22px] font-bold text-white">Slide 7</div>
            <div class="swiper-slide bg-[#0AB86F] flex items-center justify-center rounded-[18px] text-[22px] font-bold text-white">Slide 2</div>
            <div class="swiper-slide bg-[#D37A07] flex items-center justify-center rounded-[18px] text-[22px] font-bold text-white">Slide 6</div>
            <div class="swiper-slide bg-[#76A30C] flex items-center justify-center rounded-[18px] text-[22px] font-bold text-white">Slide 3</div>
            <div class="swiper-slide bg-[#236313] flex items-center justify-center rounded-[18px] text-[22px] font-bold text-white">Slide 8</div>
            <div class="swiper-slide bg-[#0044FF] flex items-center justify-center rounded-[18px] text-[22px] font-bold text-white">Slide 4</div>
            <div class="swiper-slide bg-[#DA0CDA] flex items-center justify-center rounded-[18px] text-[22px] font-bold text-white">Slide 5</div>
            <div class="swiper-slide bg-[#365E4D] flex items-center justify-center rounded-[18px] text-[22px] font-bold text-white">Slide 7</div>
            <div class="swiper-slide bg-[#0044FF] flex items-center justify-center rounded-[18px] text-[22px] font-bold text-white">Slide 9</div>
          </div>
        </div>
      </div> -->


      <div class="py-4">
        <div class="bg-no-repeat bg-cover bg-center relative">
          <div class="absolute opacity-75 inset-0 z-0"></div>
          <div>
            <div class="min-h-[50vh] flex justify-center">

              <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-4 items-center z-10">
                <div class="max-w-lg sm:text-left">

                  <p class="text-xl font-semibold">Discover how our PMP<sup>®</sup> course has empowered professionals like you to advance their careers and excel in project management.</p>
                  <!--<div class="flex flex-row  items-center space-x-3 mt-5">-->
                  <!--  <a href="https://www.behance.net/ajeeshmon" target="_blank" class="w-10 h-10 items-center justify-center inline-flex rounded-2xl font-bold text-lg   bg-blue-600 hover:drop-shadow-lg cursor-pointer transition ease-in duration-300">-->
                  <!--    <svg class="w-4 fill-gray-100" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">-->
                  <!--      <path d="M8.072 9.301s1.892-.147 1.892-2.459c0-2.315-1.548-3.441-3.51-3.441H0v12.926h6.454s3.941.129 3.941-3.816c-.001-.001.171-3.21-2.323-3.21zM2.844 5.697h3.61s.878 0 .878 1.344c0 1.346-.516 1.541-1.102 1.541H2.844V5.697zm3.427 8.332H2.844v-3.455h3.61s1.308-.018 1.308 1.775c0 1.512-.977 1.669-1.491 1.68zm9.378-7.341c-4.771 0-4.767 4.967-4.767 4.967s-.326 4.941 4.767 4.941c0 0 4.243.254 4.243-3.437H17.71s.072 1.391-1.988 1.391c0 0-2.184.152-2.184-2.25h6.423c.001-.001.709-5.612-4.312-5.612zm1.941 3.886h-4.074s.266-1.992 2.182-1.992 1.892 1.992 1.892 1.992zm.507-6.414H12.98v1.594h5.117V4.16z" />-->
                  <!--    </svg>-->
                  <!--  </a>-->
                  <!--  <a href="https://codepen.io/uidesignhub" target="_blank" class="w-10 h-10 items-center justify-center inline-flex rounded-2xl font-bold text-lg   bg-gray-900 hover:drop-shadow-lg cursor-pointer transition ease-in duration-300">-->
                  <!--    <svg class="h-5 fill-gray-100" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">-->
                  <!--      <path d="M22 15.047a.846.846 0 0 1-.008.112l-.006.037-.016.072c-.003.015-.008.028-.013.042l-.022.063-.02.042c-.008.02-.018.038-.028.057l-.025.04a.769.769 0 0 1-.108.135l-.035.034a.812.812 0 0 1-.049.04l-.038.03c-.005.003-.01.008-.015.01l-9.14 6.095a.858.858 0 0 1-.954 0l-9.14-6.094-.014-.01a.807.807 0 0 1-.088-.071c-.012-.01-.023-.022-.034-.034-.015-.015-.03-.03-.043-.046a.707.707 0 0 1-.066-.09 1.038 1.038 0 0 1-.054-.096l-.019-.042a.868.868 0 0 1-.022-.063c-.005-.014-.01-.027-.013-.042-.007-.023-.01-.048-.015-.072l-.007-.037A.847.847 0 0 1 2 15.047V8.953c0-.038.003-.075.008-.112l.007-.037c.004-.024.008-.049.015-.072a.774.774 0 0 1 .145-.295.978.978 0 0 1 .029-.038l.043-.046.034-.034a.834.834 0 0 1 .088-.07c.005-.003.009-.008.014-.01l9.14-6.095a.86.86 0 0 1 .954 0l9.14 6.094c.005.003.01.008.015.01l.038.03a.839.839 0 0 1 .05.041l.034.034a.735.735 0 0 1 .108.136l.025.04.029.056.019.042.022.063c.005.014.01.027.013.042.007.023.011.048.016.072l.006.037a.834.834 0 0 1 .008.112v6.094ZM3.719 10.562v2.876L5.869 12l-2.15-1.438Zm7.422-2.088V4.465l-6.734 4.49 3.008 2.011 3.726-2.492Zm8.452.48L12.86 4.465v4.009l3.726 2.492 3.007-2.012ZM4.407 15.046l6.734 4.489v-4.009l-3.726-2.492-3.008 2.012Zm8.453.48v4.009l6.733-4.49-3.007-2.01-3.726 2.491ZM12 9.966 8.96 12 12 14.033 15.04 12 12 9.967Zm8.281 3.472v-2.876L18.131 12l2.15 1.438Z" fill="" fill-rule="evenodd" />-->
                  <!--    </svg>-->
                  <!--  </a>-->
                  <!--  <a href="https://twitter.com/ajeemon?lang=en" target="_blank" class="w-10 h-10 items-center justify-center inline-flex rounded-2xl font-bold text-lg  text-white bg-blue-400 hover:drop-shadow-lg cursor-pointer transition ease-in duration-300"><img class="w-3" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDY4MS4zMzQ2NCA2ODEiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxnPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTIwMC45NjQ4NDQgNTE1LjI5Mjk2OWMyNDEuMDUwNzgxIDAgMzcyLjg3MTA5NC0xOTkuNzAzMTI1IDM3Mi44NzEwOTQtMzcyLjg3MTA5NCAwLTUuNjcxODc1LS4xMTcxODgtMTEuMzIwMzEzLS4zNzEwOTQtMTYuOTM3NSAyNS41ODU5MzctMTguNSA0Ny44MjQyMTgtNDEuNTg1OTM3IDY1LjM3MTA5NC02Ny44NjMyODEtMjMuNDgwNDY5IDEwLjQ0MTQwNi00OC43NTM5MDcgMTcuNDYwOTM3LTc1LjI1NzgxMyAyMC42MzY3MTggMjcuMDU0Njg3LTE2LjIzMDQ2OCA0Ny44MjgxMjUtNDEuODk0NTMxIDU3LjYyNS03Mi40ODgyODEtMjUuMzIwMzEzIDE1LjAxMTcxOS01My4zNjMyODEgMjUuOTE3OTY5LTgzLjIxNDg0NCAzMS44MDg1OTQtMjMuOTE0MDYyLTI1LjQ3MjY1Ni01Ny45NjQ4NDMtNDEuNDAyMzQ0LTk1LjY2NDA2Mi00MS40MDIzNDQtNzIuMzY3MTg4IDAtMTMxLjA1ODU5NCA1OC42ODc1LTEzMS4wNTg1OTQgMTMxLjAzMTI1IDAgMTAuMjg5MDYzIDEuMTUyMzQ0IDIwLjI4OTA2MyAzLjM5ODQzNyAyOS44ODI4MTMtMTA4LjkxNzk2OC01LjQ4MDQ2OS0yMDUuNTAzOTA2LTU3LjYyNS0yNzAuMTMyODEyLTEzNi45MjE4NzUtMTEuMjUgMTkuMzYzMjgxLTE3Ljc0MjE4OCA0MS44NjMyODEtMTcuNzQyMTg4IDY1Ljg3MTA5MyAwIDQ1LjQ2MDkzOCAyMy4xMzY3MTkgODUuNjA1NDY5IDU4LjMxNjQwNyAxMDkuMDgyMDMyLTIxLjUtLjY2MDE1Ni00MS42OTUzMTMtNi41NjI1LTU5LjM1MTU2My0xNi4zODY3MTktLjAxOTUzMS41NTA3ODEtLjAxOTUzMSAxLjA4NTkzNy0uMDE5NTMxIDEuNjcxODc1IDAgNjMuNDY4NzUgNDUuMTcxODc1IDExNi40NjA5MzggMTA1LjE0NDUzMSAxMjguNDY4NzUtMTEuMDE1NjI1IDIuOTk2MDk0LTIyLjYwNTQ2OCA0LjYwOTM3NS0zNC41NTg1OTQgNC42MDkzNzUtOC40Mjk2ODcgMC0xNi42NDg0MzctLjgyODEyNS0yNC42MzI4MTItMi4zNjMyODEgMTYuNjgzNTk0IDUyLjA3MDMxMiA2NS4wNjY0MDYgODkuOTYwOTM3IDEyMi40MjU3ODEgOTEuMDIzNDM3LTQ0Ljg1NTQ2OSAzNS4xNTYyNS0xMDEuMzU5Mzc1IDU2LjA5NzY1Ny0xNjIuNzY5NTMxIDU2LjA5NzY1Ny0xMC41NjI1IDAtMjEuMDAzOTA2LS42MDU0NjktMzEuMjYxNzE4OC0xLjgxNjQwNyA1Ny45OTk5OTk4IDM3LjE3NTc4MSAxMjYuODcxMDkzOCA1OC44NzEwOTQgMjAwLjg4NjcxODggNTguODcxMDk0IiBmaWxsPSIjZmZmZmZmIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIj48L3BhdGg+PC9nPjwvc3ZnPg=="></span>-->
                  <!--    <a href="https://in.linkedin.com/in/ajeeshmon" target="_blank" class="w-10 h-10 items-center justify-center inline-flex rounded-2xl font-bold text-lg  text-white bg-blue-500 hover:drop-shadow-lg cursor-pointer transition ease-in duration-300"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDI0IDI0IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyIiB4bWw6c3BhY2U9InByZXNlcnZlIj48Zz48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im0yMy45OTQgMjR2LS4wMDFoLjAwNnYtOC44MDJjMC00LjMwNi0uOTI3LTcuNjIzLTUuOTYxLTcuNjIzLTIuNDIgMC00LjA0NCAxLjMyOC00LjcwNyAyLjU4N2gtLjA3di0yLjE4NWgtNC43NzN2MTYuMDIzaDQuOTd2LTcuOTM0YzAtMi4wODkuMzk2LTQuMTA5IDIuOTgzLTQuMTA5IDIuNTQ5IDAgMi41ODcgMi4zODQgMi41ODcgNC4yNDN2Ny44MDF6IiBmaWxsPSIjZmZmZmZmIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIj48L3BhdGg+PHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBkPSJtLjM5NiA3Ljk3N2g0Ljk3NnYxNi4wMjNoLTQuOTc2eiIgZmlsbD0iI2ZmZmZmZiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTIuODgyIDBjLTEuNTkxIDAtMi44ODIgMS4yOTEtMi44ODIgMi44ODJzMS4yOTEgMi45MDkgMi44ODIgMi45MDkgMi44ODItMS4zMTggMi44ODItMi45MDljLS4wMDEtMS41OTEtMS4yOTItMi44ODItMi44ODItMi44ODJ6IiBmaWxsPSIjZmZmZmZmIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIj48L3BhdGg+PC9nPjwvc3ZnPg==" class="w-3"></a>-->
                  <!--</div>-->
                </div>

                <div class="mx-0 max-w-xl flex rounded-2xl bg-gray-100">
                  <div class="swiper-container flex-col flex  self-center">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <blockquote class="text-left ">

                          <div class="relative m-5 p-5">
                            <svg class="absolute left-0 w-6  fill-red-600" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                              <path d="M464 256h-80v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8c-88.4 0-160 71.6-160 160v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48zm-288 0H96v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8C71.6 32 0 103.6 0 192v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48z" />
                            </svg>
                            <p class="text-gray-500 text-xl px-5">Eureka Learnings provided an outstanding learning experience during my PMP<sup>®</sup> preparatory course. The instructors' expertise and teaching style made complex topics easy to grasp. The support services were excellent too. I highly recommend Eureka Learnings for quality education.
                            </p>
                            <svg class="absolute right-0  w-6 fill-red-600" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                              <path d="M464 32H336c-26.5 0-48 21.5-48 48v128c0 26.5 21.5 48 48 48h80v64c0 35.3-28.7 64-64 64h-8c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24h8c88.4 0 160-71.6 160-160V80c0-26.5-21.5-48-48-48zm-288 0H48C21.5 32 0 53.5 0 80v128c0 26.5 21.5 48 48 48h80v64c0 35.3-28.7 64-64 64h-8c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24h8c88.4 0 160-71.6 160-160V80c0-26.5-21.5-48-48-48z" />
                            </svg>
                            <div class="text-sm mt-5 mx-5">
                              <p class="font-medium text-black">Rajanikanta Biswal</p>
                              <p class="mt-1 text-gray-600">Web Developer</p>
                            </div>
                          </div>

                        </blockquote>
                      </div>
                      <div class="swiper-slide">
                        <blockquote class="text-left ">

                          <div class="relative m-5 p-5">
                            <svg class="absolute left-0 w-6  fill-red-600" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                              <path d="M464 256h-80v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8c-88.4 0-160 71.6-160 160v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48zm-288 0H96v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8C71.6 32 0 103.6 0 192v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48z" />
                            </svg>
                            <p class="text-gray-500 text-xl px-5">PMP certification from Eureka Learnings revolutionized my career, opening new horizons. Highly recommended for aspiring professionals.
                            </p>
                            <svg class="absolute right-0  w-6 fill-red-600" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                              <path d="M464 32H336c-26.5 0-48 21.5-48 48v128c0 26.5 21.5 48 48 48h80v64c0 35.3-28.7 64-64 64h-8c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24h8c88.4 0 160-71.6 160-160V80c0-26.5-21.5-48-48-48zm-288 0H48C21.5 32 0 53.5 0 80v128c0 26.5 21.5 48 48 48h80v64c0 35.3-28.7 64-64 64h-8c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24h8c88.4 0 160-71.6 160-160V80c0-26.5-21.5-48-48-48z" />
                            </svg>
                            <div class="text-sm mt-5 mx-5">
                              <p class="font-medium text-black">Dinesh Mishra</p>
                              <p class="mt-1 text-gray-600">Project Manager, Syntelinc
                              </p>
                            </div>
                          </div>

                        </blockquote>
                      </div>
                      <div class="swiper-slide">
                        <blockquote class="text-left ">

                          <div class="relative m-5 p-5">
                            <svg class="absolute left-0 w-6  fill-red-600" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                              <path d="M464 256h-80v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8c-88.4 0-160 71.6-160 160v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48zm-288 0H96v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8C71.6 32 0 103.6 0 192v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48z" />
                            </svg>
                            <p class="text-gray-500 text-xl px-5">Excellent training conducted. I like the scenario based discussion, and healthy conversations with different perspectives of the participants which helped to learn better. Sharing different experiences and different participants presenting their views on certain topics. Follow the instructions provided, be more interactive, ask relevant questions in case of doubts. Would recommend the training.
                            </p>
                            <svg class="absolute right-0  w-6 fill-red-600" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                              <path d="M464 32H336c-26.5 0-48 21.5-48 48v128c0 26.5 21.5 48 48 48h80v64c0 35.3-28.7 64-64 64h-8c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24h8c88.4 0 160-71.6 160-160V80c0-26.5-21.5-48-48-48zm-288 0H48C21.5 32 0 53.5 0 80v128c0 26.5 21.5 48 48 48h80v64c0 35.3-28.7 64-64 64h-8c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24h8c88.4 0 160-71.6 160-160V80c0-26.5-21.5-48-48-48z" />
                            </svg>
                            <div class="text-sm mt-5 mx-5">
                              <p class="font-medium text-black">Mr. Praval Srivastava
                              </p>
                              <p class="mt-1 text-gray-600">Project Manager, IBM

                              </p>
                            </div>
                          </div>

                        </blockquote>
                      </div>
                      <div class="swiper-slide">
                        <blockquote class="text-left ">

                          <div class="relative m-5 p-5">
                            <svg class="absolute left-0 w-6  fill-red-600" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                              <path d="M464 256h-80v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8c-88.4 0-160 71.6-160 160v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48zm-288 0H96v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8C71.6 32 0 103.6 0 192v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48z" />
                            </svg>
                            <p class="text-gray-500 text-xl px-5">Achieving PMP certification with Eureka Learnings was transformative, unlocking new opportunities. A game-changer for career growth</p>
                            <svg class="absolute right-0  w-6 fill-red-600" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                              <path d="M464 32H336c-26.5 0-48 21.5-48 48v128c0 26.5 21.5 48 48 48h80v64c0 35.3-28.7 64-64 64h-8c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24h8c88.4 0 160-71.6 160-160V80c0-26.5-21.5-48-48-48zm-288 0H48C21.5 32 0 53.5 0 80v128c0 26.5 21.5 48 48 48h80v64c0 35.3-28.7 64-64 64h-8c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24h8c88.4 0 160-71.6 160-160V80c0-26.5-21.5-48-48-48z" />
                            </svg>
                            <div class="text-sm mt-5 mx-5">
                              <p class="font-medium text-black">Mr. Rahul Sharma

                              </p>
                              <p class="mt-1 text-gray-600">Senior Solution Architect, Linx-AS

                              </p>
                            </div>
                          </div>

                        </blockquote>
                      </div>

                    </div>

                    <div class="mt-12 swiper-pagination hidden"></div>
                  </div>
                </div>
              </div>



            </div>
          </div>
        </div>
      </div>

    </section>

    <section class="px-4 md:px-[100px]   body-font">
         <!-- component -->
    <div class="py-16">
        <div class="mx-auto px-6 max-w-6xl text-gray-500">
           
            <div class="mt-12 grid sm:grid-cols-2  gap-3">
                <div class="relative group overflow-hidden p-8 rounded-xl bg-white border border-gray-200 ">
                    <div aria-hidden="true" class="inset-0 absolute aspect-video border rounded-full -translate-y-1/2 group-hover:-translate-y-1/4 duration-300 bg-gradient-to-b from-blue-500 to-white  blur-2xl opacity-25 "></div>
                    <div class="relative">
                        <div class="border border-blue-500/10 flex relative *:relative *:size-6 *:m-auto size-12 rounded-lg  before:rounded-[7px] before:absolute before:inset-0 before:border-t before:border-white before:from-blue-100 before:bg-gradient-to-b   before:shadow ">
                            <svg class="text-[#000014] " xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 128 128">
                                <defs>
                                    <linearGradient id="deviconAstro0" x1="882.997" x2="638.955" y1="27.113" y2="866.902" gradientTransform="scale(.1)" gradientUnits="userSpaceOnUse">
                                        <stop offset="0" stop-color="currentColor"></stop>
                                        <stop offset="1" stop-color="currentColor"></stop>
                                    </linearGradient>
                                    <linearGradient id="deviconAstro1" x1="1001.68" x2="790.326" y1="652.45" y2="1094.91" gradientTransform="scale(.1)" gradientUnits="userSpaceOnUse">
                                        <stop offset="0" stop-color="#ff1639"></stop>
                                        <stop offset="1" stop-color="#ff1639" stop-opacity="0"></stop>
                                    </linearGradient>
                                </defs>
                                <path fill="url(#deviconAstro0)" d="M81.504 9.465c.973 1.207 1.469 2.836 2.457 6.09l21.656 71.136a90.079 90.079 0 0 0-25.89-8.765L65.629 30.28a1.833 1.833 0 0 0-3.52.004L48.18 77.902a90.104 90.104 0 0 0-26.003 8.778l21.758-71.14c.996-3.25 1.492-4.876 2.464-6.083a8.023 8.023 0 0 1 3.243-2.398c1.433-.575 3.136-.575 6.535-.575H71.72c3.402 0 5.105 0 6.543.579a7.988 7.988 0 0 1 3.242 2.402Zm0 0"></path>
                                <path fill="#ff5d01" d="M84.094 90.074c-3.57 3.055-10.696 5.137-18.903 5.137c-10.07 0-18.515-3.137-20.754-7.356c-.8 2.418-.98 5.184-.98 6.954c0 0-.527 8.675 5.508 14.71a5.671 5.671 0 0 1 5.672-5.671c5.37 0 5.367 4.683 5.363 8.488v.336c0 5.773 3.527 10.719 8.543 12.805a11.62 11.62 0 0 1-1.172-5.098c0-5.508 3.23-7.555 6.988-9.938c2.989-1.894 6.309-4 8.594-8.222a15.513 15.513 0 0 0 1.875-7.41a15.55 15.55 0 0 0-.734-4.735m0 0"></path>
                                <path fill="url(#deviconAstro1)" d="M84.094 90.074c-3.57 3.055-10.696 5.137-18.903 5.137c-10.07 0-18.515-3.137-20.754-7.356c-.8 2.418-.98 5.184-.98 6.954c0 0-.527 8.675 5.508 14.71a5.671 5.671 0 0 1 5.672-5.671c5.37 0 5.367 4.683 5.363 8.488v.336c0 5.773 3.527 10.719 8.543 12.805a11.62 11.62 0 0 1-1.172-5.098c0-5.508 3.23-7.555 6.988-9.938c2.989-1.894 6.309-4 8.594-8.222a15.513 15.513 0 0 0 1.875-7.41a15.55 15.55 0 0 0-.734-4.735m0 0"></path>
                            </svg>
                        </div>

                        <div class="mt-6 pb-6 rounded-b-[--card-border-radius]">
                            <p class="text-gray-700 ">Amet praesentium deserunt ex commodi tempore fuga voluptatem. Sit, sapiente.</p>
                        </div>

                        <div class="flex gap-3 -mb-8 py-4 border-t border-gray-200 ">
                            <a href="#" download="/" class="group rounded-xl disabled:border *:select-none [&>*:not(.sr-only)]:relative *:disabled:opacity-20 disabled:text-gray-950 disabled:border-gray-200 disabled:bg-gray-100 dark:disabled:border-gray-800/50 disabled:dark:bg-gray-900 dark:*:disabled:!text-white text-gray-950 bg-gray-100 hover:bg-gray-200/75 active:bg-gray-100 dark:text-white dark:bg-gray-500/10 dark:hover:bg-gray-500/15 dark:active:bg-gray-500/10 flex gap-1.5 items-center text-sm h-8 px-3.5 justify-center">
                                <span>Download</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m17 13l-5 5m0 0l-5-5m5 5V6"></path></svg>
                            </a>
                            <a href="#" class="group flex items-center rounded-xl disabled:border *:select-none [&>*:not(.sr-only)]:relative *:disabled:opacity-20 disabled:text-gray-950 disabled:border-gray-200 disabled:bg-gray-100 dark:disabled:border-gray-800/50 disabled:dark:bg-gray-900 dark:*:disabled:!text-white text-gray-950 bg-gray-100 hover:bg-gray-200/75 active:bg-gray-100 dark:text-white dark:bg-gray-500/10 dark:hover:bg-gray-500/15 dark:active:bg-gray-500/10 size-8 justify-center">
                                <span class="sr-only">Source Code</span>
                                <svg class="size-5" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2A10 10 0 0 0 2 12c0 4.42 2.87 8.17 6.84 9.5c.5.08.66-.23.66-.5v-1.69c-2.77.6-3.36-1.34-3.36-1.34c-.46-1.16-1.11-1.47-1.11-1.47c-.91-.62.07-.6.07-.6c1 .07 1.53 1.03 1.53 1.03c.87 1.52 2.34 1.07 2.91.83c.09-.65.35-1.09.63-1.34c-2.22-.25-4.55-1.11-4.55-4.92c0-1.11.38-2 1.03-2.71c-.1-.25-.45-1.29.1-2.64c0 0 .84-.27 2.75 1.02c.79-.22 1.65-.33 2.5-.33c.85 0 1.71.11 2.5.33c1.91-1.29 2.75-1.02 2.75-1.02c.55 1.35.2 2.39.1 2.64c.65.71 1.03 1.6 1.03 2.71c0 3.82-2.34 4.66-4.57 4.91c.36.31.69.92.69 1.85V21c0 .27.16.59.67.5C19.14 20.16 22 16.42 22 12A10 10 0 0 0 12 2"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
                  <div class="relative group overflow-hidden p-8 rounded-xl bg-white border border-gray-200 ">
                    <div aria-hidden="true" class="inset-0 absolute aspect-video border rounded-full -translate-y-1/2 group-hover:-translate-y-1/4 duration-300 bg-gradient-to-b from-blue-500 to-white  blur-2xl opacity-25 "></div>
                    <div class="relative">
                        <div class="border border-blue-500/10 flex relative *:relative *:size-6 *:m-auto size-12 rounded-lg  before:rounded-[7px] before:absolute before:inset-0 before:border-t before:border-white before:from-blue-100 before:bg-gradient-to-b   before:shadow ">
                            <svg class="text-[#000014] " xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 128 128">
                                <defs>
                                    <linearGradient id="deviconAstro0" x1="882.997" x2="638.955" y1="27.113" y2="866.902" gradientTransform="scale(.1)" gradientUnits="userSpaceOnUse">
                                        <stop offset="0" stop-color="currentColor"></stop>
                                        <stop offset="1" stop-color="currentColor"></stop>
                                    </linearGradient>
                                    <linearGradient id="deviconAstro1" x1="1001.68" x2="790.326" y1="652.45" y2="1094.91" gradientTransform="scale(.1)" gradientUnits="userSpaceOnUse">
                                        <stop offset="0" stop-color="#ff1639"></stop>
                                        <stop offset="1" stop-color="#ff1639" stop-opacity="0"></stop>
                                    </linearGradient>
                                </defs>
                                <path fill="url(#deviconAstro0)" d="M81.504 9.465c.973 1.207 1.469 2.836 2.457 6.09l21.656 71.136a90.079 90.079 0 0 0-25.89-8.765L65.629 30.28a1.833 1.833 0 0 0-3.52.004L48.18 77.902a90.104 90.104 0 0 0-26.003 8.778l21.758-71.14c.996-3.25 1.492-4.876 2.464-6.083a8.023 8.023 0 0 1 3.243-2.398c1.433-.575 3.136-.575 6.535-.575H71.72c3.402 0 5.105 0 6.543.579a7.988 7.988 0 0 1 3.242 2.402Zm0 0"></path>
                                <path fill="#ff5d01" d="M84.094 90.074c-3.57 3.055-10.696 5.137-18.903 5.137c-10.07 0-18.515-3.137-20.754-7.356c-.8 2.418-.98 5.184-.98 6.954c0 0-.527 8.675 5.508 14.71a5.671 5.671 0 0 1 5.672-5.671c5.37 0 5.367 4.683 5.363 8.488v.336c0 5.773 3.527 10.719 8.543 12.805a11.62 11.62 0 0 1-1.172-5.098c0-5.508 3.23-7.555 6.988-9.938c2.989-1.894 6.309-4 8.594-8.222a15.513 15.513 0 0 0 1.875-7.41a15.55 15.55 0 0 0-.734-4.735m0 0"></path>
                                <path fill="url(#deviconAstro1)" d="M84.094 90.074c-3.57 3.055-10.696 5.137-18.903 5.137c-10.07 0-18.515-3.137-20.754-7.356c-.8 2.418-.98 5.184-.98 6.954c0 0-.527 8.675 5.508 14.71a5.671 5.671 0 0 1 5.672-5.671c5.37 0 5.367 4.683 5.363 8.488v.336c0 5.773 3.527 10.719 8.543 12.805a11.62 11.62 0 0 1-1.172-5.098c0-5.508 3.23-7.555 6.988-9.938c2.989-1.894 6.309-4 8.594-8.222a15.513 15.513 0 0 0 1.875-7.41a15.55 15.55 0 0 0-.734-4.735m0 0"></path>
                            </svg>
                        </div>

                        <div class="mt-6 pb-6 rounded-b-[--card-border-radius]">
                            <p class="text-gray-700 ">Amet praesentium deserunt ex commodi tempore fuga voluptatem. Sit, sapiente.</p>
                        </div>

                        <div class="flex gap-3 -mb-8 py-4 border-t border-gray-200 ">
                            <a href="#" download="/" class="group rounded-xl disabled:border *:select-none [&>*:not(.sr-only)]:relative *:disabled:opacity-20 disabled:text-gray-950 disabled:border-gray-200 disabled:bg-gray-100 dark:disabled:border-gray-800/50 disabled:dark:bg-gray-900 dark:*:disabled:!text-white text-gray-950 bg-gray-100 hover:bg-gray-200/75 active:bg-gray-100 dark:text-white dark:bg-gray-500/10 dark:hover:bg-gray-500/15 dark:active:bg-gray-500/10 flex gap-1.5 items-center text-sm h-8 px-3.5 justify-center">
                                <span>Download</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m17 13l-5 5m0 0l-5-5m5 5V6"></path></svg>
                            </a>
                            <a href="#" class="group flex items-center rounded-xl disabled:border *:select-none [&>*:not(.sr-only)]:relative *:disabled:opacity-20 disabled:text-gray-950 disabled:border-gray-200 disabled:bg-gray-100 dark:disabled:border-gray-800/50 disabled:dark:bg-gray-900 dark:*:disabled:!text-white text-gray-950 bg-gray-100 hover:bg-gray-200/75 active:bg-gray-100 dark:text-white dark:bg-gray-500/10 dark:hover:bg-gray-500/15 dark:active:bg-gray-500/10 size-8 justify-center">
                                <span class="sr-only">Source Code</span>
                                <svg class="size-5" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2A10 10 0 0 0 2 12c0 4.42 2.87 8.17 6.84 9.5c.5.08.66-.23.66-.5v-1.69c-2.77.6-3.36-1.34-3.36-1.34c-.46-1.16-1.11-1.47-1.11-1.47c-.91-.62.07-.6.07-.6c1 .07 1.53 1.03 1.53 1.03c.87 1.52 2.34 1.07 2.91.83c.09-.65.35-1.09.63-1.34c-2.22-.25-4.55-1.11-4.55-4.92c0-1.11.38-2 1.03-2.71c-.1-.25-.45-1.29.1-2.64c0 0 .84-.27 2.75 1.02c.79-.22 1.65-.33 2.5-.33c.85 0 1.71.11 2.5.33c1.91-1.29 2.75-1.02 2.75-1.02c.55 1.35.2 2.39.1 2.64c.65.71 1.03 1.6 1.03 2.71c0 3.82-2.34 4.66-4.57 4.91c.36.31.69.92.69 1.85V21c0 .27.16.59.67.5C19.14 20.16 22 16.42 22 12A10 10 0 0 0 12 2"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </section>


    <section class="px-4 md:px-[100px] py-16">
      <div class="container bg-red-600 mx-auto">
        <div class="relative z-10 overflow-hidden rounded bg-primary py-12 px-8 md:p-[70px]">
          <div class="flex flex-wrap items-center -mx-4">
            <div class="w-full px-4 lg:w-2/3">
              <span class="block mb-4 text-base font-medium text-white">
                Find Your Next Dream Job
              </span>
              <h2 class="mb-6 text-3xl font-bold leading-tight text-white sm:mb-8 sm:text-[40px]/[48px] lg:mb-0">
                <span class="xs:block">Advance Your Career with</span>
                <span> PMP<sup>®</sup>!</span>
              </h2>
            </div>
            <div class="w-full px-4 lg:w-1/3">
              <div class="flex flex-wrap lg:justify-end">
                <button class="openCtaBtn py-3 my-1 mr-4 text-base font-medium transition bg-white rounded-md hover:bg-shadow-1 text-primary px-7">Contact Us</button>
                <!-- <a href="javascript:void(0)" class="inline-flex py-3 my-1 text-base font-medium text-white transition rounded-md bg-secondary px-7 hover:bg-opacity-90">
                  Ask Our Experts
                </a> -->
              </div>
            </div>
          </div>
          <div>
            <span class="absolute top-0 left-0 z-[-1]">
              <svg width="189" height="162" viewBox="0 0 189 162" fill="none" xmlns="http://www.w3.org/2000/svg">
                <ellipse cx="16" cy="-16.5" rx="173" ry="178.5" transform="rotate(180 16 -16.5)" fill="url(#paint0_linear)" />
                <defs>
                  <linearGradient id="paint0_linear" x1="-157" y1="-107.754" x2="98.5011" y2="-106.425" gradientUnits="userSpaceOnUse">
                    <stop stop-color="white" stop-opacity="0.07" />
                    <stop offset="1" stop-color="white" stop-opacity="0" />
                  </linearGradient>
                </defs>
              </svg>
            </span>
            <span class="absolute bottom-0 right-0 z-[-1]">
              <svg width="191" height="208" viewBox="0 0 191 208" fill="none" xmlns="http://www.w3.org/2000/svg">
                <ellipse cx="173" cy="178.5" rx="173" ry="178.5" fill="url(#paint0_linear)" />
                <defs>
                  <linearGradient id="paint0_linear" x1="-3.27832e-05" y1="87.2457" x2="255.501" y2="88.5747" gradientUnits="userSpaceOnUse">
                    <stop stop-color="white" stop-opacity="0.07" />
                    <stop offset="1" stop-color="white" stop-opacity="0" />
                  </linearGradient>
                </defs>
              </svg>
            </span>
          </div>
        </div>
      </div>

    </section>




    <footer class="relative bg-black text-white pt-8 pb-6">
      <div class="container mx-auto px-4">
        <div class="flex flex-wrap text-left lg:text-left">
          <div class="w-full lg:w-6/12 px-4">
            <h4 class="text-3xl fonat-semibold text-blueGray-700">Let's keep in touch!</h4>
            <h5 class="text-lg mt-0 mb-2 text-blueGray-600">
              Find us on any of these platforms, we respond 1-2 business days.
            </h5>
            <div class="mt-6 lg:mb-0 mb-6">
              <button class="bg-white text-black shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                <i class="fab fa-twitter"></i></button><button class="bg-white text-black shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                <i class="fab fa-facebook-square"></i></button><button class="bg-white text-black shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                <i class="fab fa-dribbble"></i></button><button class="bg-white text-black shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                <i class="fab fa-github"></i>
              </button>
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="flex flex-wrap items-top mb-6">
              <div class="w-full lg:w-4/12 px-4 ml-auto">
                <span class="block uppercase text-blueGray-500 text-sm font-semibold mb-2">Useful Links</span>
                <ul class="list-unstyled">
                  <li>
                    <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://www.creative-tim.com/presentation?ref=njs-profile">About Us</a>
                  </li>
                  <li>
                    <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://blog.creative-tim.com?ref=njs-profile">Blog</a>
                  </li>
                  <li>
                    <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://www.github.com/creativetimofficial?ref=njs-profile">Github</a>
                  </li>
                  <li>
                    <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://www.creative-tim.com/bootstrap-themes/free?ref=njs-profile">Free Products</a>
                  </li>
                </ul>
              </div>
              <div class="w-full lg:w-4/12 px-4">
                <span class="block uppercase text-blueGray-500 text-sm font-semibold mb-2">Other Resources</span>
                <ul class="list-unstyled">
                  <li>
                    <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://github.com/creativetimofficial/notus-js/blob/main/LICENSE.md?ref=njs-profile">MIT
                      License</a>
                  </li>
                  <li>
                    <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://creative-tim.com/terms?ref=njs-profile">Terms &amp; Conditions</a>
                  </li>
                  <li>
                    <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://creative-tim.com/privacy?ref=njs-profile">Privacy Policy</a>
                  </li>
                  <li>
                    <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://creative-tim.com/contact-us?ref=njs-profile">Contact Us</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <hr class="my-6 border-blueGray-300">
        <div class="flex flex-wrap items-center md:justify-between justify-center">
          <div class="w-full md:w-4/12 px-4 mx-auto text-center">
            <div class="text-sm text-blueGray-500 font-semibold py-1">
              Copyright © <span id="get-current-year">2024</span><a href="https://www.eurekalearnings.in" class="text-blueGray-500 hover:text-gray-800" target="_blank"> Eureka Learnings
            </div>
          </div>
        </div>
      </div>
    </footer>

  </main>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    var openModalButtons = document.querySelectorAll('.openModalButton');
    openModalButtons.forEach(function(button) {
      button.addEventListener('click', function() {
        document.getElementById('myModal').classList.remove('hidden');
        document.getElementById('overlay').style.display = 'block';
        document.body.classList.add('modal-open');
      });
    });

    var openCtaBtn = document.querySelectorAll('.openCtaBtn');
    openCtaBtn.forEach(function(button) {
      button.addEventListener('click', function() {
        document.getElementById('ctaModal').classList.remove('hidden');
        document.getElementById('overlay').style.display = 'block';
        document.body.classList.add('modal-open');
      });
    });

    function closeModal() {
      document.getElementById('myModal').classList.add('hidden');
      document.getElementById('overlay').style.display = 'none';
      document.body.classList.remove('modal-open');
    }

    function closeCtaModal() {
      document.getElementById('ctaModal').classList.add('hidden');
      document.getElementById('overlay').style.display = 'none';
      document.body.classList.remove('modal-open');
    }

    // var swiper = new Swiper(".mySwiper", {
    //   effect: "cards",
    //   grabCursor: true,
    //   autoplay: {
    //     delay: 2500,
    //     disableOnInteraction: false,
    //   },
    //   loop: true,
    // });

    document.addEventListener('DOMContentLoaded', function() {
      new Swiper('.swiper-container', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 8,
        autoplay: {
          delay: 3000,
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        breakpoints: {
          640: {
            slidesPerView: 1.5,
          },
          1024: {
            slidesPerView: 1,
          },
        },
      })
    })


    function removeAlert() {
      var alertBox = document.querySelector(".alertBox");
      alertBox.classList.add('hidden');
    }
  </script>

</body>

</html>