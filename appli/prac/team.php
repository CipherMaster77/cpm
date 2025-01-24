<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Slider Blog Card</title>
      <link rel="stylesheet" href="Design/Team.css">
   </head>
   <body>
      <Style> 
      @import url("https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700,800");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.blog-card {
  position: relative;
  height: 500px; /* Adjusted for smaller homepage sections */
  width: 100%; /* Adjusted width to make it responsive */
  max-width: 1600px; /* Scaled down max-width */
  margin: auto;
  border-radius: 2px;
  background: #eaeff2;
  overflow: hidden;
}

.inner-part {
  position: absolute;
  display: flex;
  height: 100%; /* Automatically scales based on the container height */
  align-items: center;
  justify-content: center;
  padding: 0 15px;
}

#imgTap:checked ~ .inner-part {
  padding: 0;
  transition: 0.1s ease-in;
}

.inner-part .img {
  height: 400px; /* Adjusted image size */
  width: 400px;
  flex-shrink: 0;
  overflow: hidden;
  border-radius: 15px;

}

#imgTap:checked ~ .inner-part .img {
  height: 300px; /* Dynamically scales on toggle */
  width: 750px;
  z-index: 99;
  margin-top: 10px;
  transition: 0.3s 0.2s ease-in;
}

.img img {
  height: 100%;
  width: 100%;
  object-fit: cover;
  cursor: pointer;
  opacity: 0;
  transition: 0.6s;
}

#tap-1:checked ~ .inner-part .img-1,
#tap-2:checked ~ .inner-part .img-2,
#tap-3:checked ~ .inner-part .img-3 {
  opacity: 1;
  transition-delay: 0.2s;
}
.content {
  padding: 0 20px 0 35px;
  width: 500px; /* Adjusted for better fit */
  margin-left: 30px; /* Reduced margin to avoid conflict */
  opacity: 0;
  transition: .6s;
}

#imgTap:checked ~ .inner-part .content {
  display: none;
}

#tap-1:checked ~ .inner-part .content-1,
#tap-2:checked ~ .inner-part .content-2,
#tap-3:checked ~ .inner-part .content-3 {
  opacity: 1;
  margin-left: 350px;
  z-index: 100;
  transition-delay: 0.3s;
}

.content span {
  display: block;
  color: #080d23;
  margin-bottom: 10px;
  font-size: 20px;
  font-weight: 500;
}

.content .title {
  font-size: 24px;
  font-weight: 700;
  color: #0d0925;
  margin-bottom: 15px;
}

.content .text {
  color: #4e4a67;
  font-size: 16px;
  margin-bottom: 20px;
  line-height: 1.5em;
  text-align: justify;
}

.content button {
  display: inline-flex;
  padding: 10px 10px;
  border: none;
  font-size: 14px;
  text-transform: uppercase;
  color: #fff0e6;
  font-weight: 600;
  letter-spacing: 1px;
  border-radius: 50px;
  cursor: pointer;
  outline: none;
  background: #080d23;
}

.content button:hover {
  background:#040a33;
}

.sliders {
  position: absolute;
  bottom: 25px;
  left: 50%; /* Adjusted position to center better */
  transform: translateX(-50%);
  z-index: 12;
}

#imgTap:checked ~ .sliders {
  display: none;
}

.sliders .tap {
  position: relative;
  height: 8px;
  width: 40px;
  background: #d9d9d9;
  border-radius: 5px;
  display: inline-flex;
  margin: 0 3px;
  cursor: pointer;
}

.sliders .tap:hover {
  background: #cccccc;
}

.sliders .tap:before {
  position: absolute;
  content: "";
  top: 0;
  left: 0;
  height: 100%;
  width: -100%;
  background: linear-gradient(147deg, #f6b323 0%, #f23b26 74%);
  border-radius: 10px;
  transform: scaleX(0);
  transition: transform 0.6s;
  transform-origin: left;
}

input[type="radio"],
input[type="checkbox"] {
  display: none;
}

#tap-1:checked ~ .sliders .tap-1:before,
#tap-2:checked ~ .sliders .tap-2:before,
#tap-3:checked ~ .sliders .tap-3:before {
  transform: scaleX(1);
  width: 100%;
}

/* Style for the section */
#teams {
  position: relative; /* Makes it a positioned container */
  width: 100%; /* Full width of the page */
  min-height: 500px; /* Minimum height for the section */
  background-color: #eaeff2; /* Light background for contrast */
  display: flex; /* Center content flexibly */
  align-items: center; /* Vertical center */
  justify-content: center; /* Horizontal center */
  padding: 20px;
}

/* Unique styling for the h1 */
#unique-team-header {
  font-size: 3rem; /* Large font size */
  font-weight: bold; /* Bold text */
  color: #080d23; /* Distinct text color */
  text-align: center; /* Center text horizontally */
  font-family: 'Fira Sans', sans-serif; /* Unique font */
  margin: 0; /* Remove default margins */
  opacity: 0; /* Start invisible */
  animation: fadeIn 2s ease-in forwards; /* Fade-in animation */
}

/* Keyframes for fade-in effect */
@keyframes fadeIn {
  0% {
    opacity: 0;
    transform: translateY(20px); /* Slight upward movement */
  }
  100% {
    opacity: 1;
    transform: translateY(0); /* Return to original position */
  }
}

      </Style>
   <section class="team" id="team">
      <div class="blog-card">
         <input type="radio" name="select" id="tap-1" checked>
         <input type="radio" name="select" id="tap-2">
         <input type="radio" name="select" id="tap-3">
         <input type="checkbox" id="imgTap">
         <div class="sliders">
            <label for="tap-1" class="tap tap-1"></label>
            <label for="tap-2" class="tap tap-2"></label>
            <label for="tap-3" class="tap tap-3"></label>
         </div>
         <div class="inner-part">
            <label for="imgTap" class="img">
            <img class="img-1" src="images/t4.jpg">
            </label>
            <div class="content content-1">
            <h1 id="unique-team-header">OUR TEAM</h1>
               <span>Client Relations Manager </span>
               <div class="title">
               Sofia
               </div>
               <div class="text">
               As our Client Relations Manager, you’ll be the main point of contact for our clients, ensuring their needs are met with professionalism and care. 
               You’ll build strong relationships, provide exceptional service, and help create a smooth and positive experience for every client. 
               Your role is key to maintaining trust and fostering long-term partnerships.
               </div>
               <button>Read more</button>
            </div>
         </div>
         <div class="inner-part">
            <label for="imgTap" class="img">
            <img class="img-2" src="images/t2.jpg">
            </label>
            <div class="content content-2">
               <span>Office Administrator</span>
               <div class="title">
               Luca
               </div>
               <div class="text">
               As our Office Administrator, you'll keep things running smoothly behind the scenes. From managing schedules and handling client inquiries to organizing office operations, 
               you’ll be the go-to person for ensuring everything operates efficiently. Your attention to detail and organizational skills will help 
               our team stay on track and provide top-notch service to our clients.
               </div>
               <button>Read more</button>
            </div>
         </div>
         <div class="inner-part">
            <label for="imgTap" class="img">
            <img class="img-3" src="images/t3.avif">
            </label>
            <div class="content content-3">
               <span>Marketing Coordinator</span>
               <div class="title">
                  Lorem Ipsum Dolor
               </div>
               <div class="text">
               As our Marketing Coordinator, you'll be the creative force behind promoting our brand. From managing social media to creating engaging content, 
               you'll help drive our message to the right audience. 
               Your efforts will play a vital role in enhancing our online presence and growing our business.
               </div>
               <button>Read more</button>
            </div>
         </div>
      </div>
   </body>
</html>