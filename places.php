<?php 

    session_start();
    include("DBConnection.php");

    // checked whther user login or logout
    if(isset($_SESSION["uname"])){
        $uname = $_SESSION["uname"];
            include("header2.php");
    }
    else{
            include("header.html");
    }


 ?>

<!doctype html>
<html lang="en">
<head>
	<title>Rubi</title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="icon/png" href="asset/img/logo/rail_icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">

    <!-- :start of optional css-->

    <!-- font-awesome for icon -->
    <link rel="stylesheet" href="asset/font-awesome/css/all.min.css">

    <!-- animation css -->
    <link rel="stylesheet" href="asset/css/animate.css">

    <!-- hover css animations -->
    <link rel="stylesheet" href="asset/css/hover-min.css">

    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="asset/css/custom.css">


    <!-- :end of optional css -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="asset/js/jquery-3.4.1.slim.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/validation.js"></script>

    <style>

        .bg-black{
            background-color:black;
        }
        .card{
            box-shadow: 2px 2px 18px 0px #666;
        }
    </style>

</head>
<body>

	<!-- header navbar -->
   

<div class="bg-light">
    <div class="container p-5 ">
    <h4>Cities of historical places...</h4>
    <hr>
        <div class="row">

            <!-- card-deck is used to set same size of all cards -->
            <div class="col-12 col-sm-6 col-md-4 mt-4 card-deck">
                <div class="card">
                    <img class="card-img-top" src="asset/img/holidays/goa.jpg">
                        <h3 class="m-1 text-center">Goa</h3>
                    <div class="card-body">
                        Situated on the Western Coast, Goa is the place associated most with touristy beaches, happening nightlife and old Portuguese architecture.
                        <br><br><br><br>
                        <b>Best Time:</b> October to March 
                        <hr>
                        <div class="text-right mt-3">
                            <button class="btn text-light btn-dark" data-toggle="modal" data-target="#first" data-toggle="modal" >Read More</button>
                        </div>
                    </div>
                </div>
            </div>

           

            <div class="col-12 col-sm-6 col-md-4 mt-4 card-deck">
                <div class="card">
                    <img class="card-img-top" src="asset/img/holidays/agra.jpg">
                        <h3 class="m-1 text-center">Agra</h3>
                    <div class="card-body">
                        Home to one of the 7 wonders of the world, Taj Mahal, Agra is a sneak peek into the architectural history with other structures such as Agra Fort and Fatehpur Sikri and hence makes for a must visit for anyone living in or visiting India. 
                        <br><br>
                        <b>Best Time:</b> October to March 
                        <hr>
                        <div class="text-right mt-3">
                            <button class="btn text-light btn-dark" data-toggle="modal" data-target="#modal2">Read More</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 mt-4 card-deck">
                <div class="card">
                    <img class="card-img-top" src="asset/img/holidays/manali.jpg">
                        <h3 class="m-1 text-center">Manali</h3>
                    <div class="card-body">
                        Nestled at one end of the Kullu Valley, Manali is a hill station with attraction such as the Rohtang pass nearby and is popular among tourists, especially during summers. 
                        <br><br>
                        <b>Best Time:</b>  October to June  
                        <hr>
                        <div class="text-right mt-3">
                            <button class="btn text-light btn-dark" data-toggle="modal" data-target="#modal3">Read More</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 mt-4 card-deck">
                <div class="card">
                    <img class="card-img-top" src="asset/img/holidays/jaipur.jpg">
                        <h3 class="m-1 text-center">Jaipur</h3>
                    <div class="card-body">
                        Jaipur, the 'Pink City', is one of the most royal, majestic and colourful cities of India with a very strong historical background and vibrant culture.
                        <br><br>
                        <b>Best Time:</b> October to March 
                        <hr>
                        <div class="text-right mt-3">
                            <button class="btn text-light btn-dark" data-toggle="modal" data-target="#modal4">Read More</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 col-sm-6 col-md-4 mt-4 card-deck">
                <div class="card">
                    <img class="card-img-top" src="asset/img/holidays/udaipur.jpg">
                        <h3 class="m-1 text-center">Udaipur</h3>
                    <div class="card-body">
                        Located in a valley and surrounded by 4 lakes, it is at times referred to as the 'Kashmir of Rajasthan' 
                        <br><br>
                        <b>Best Time:</b> October to March 
                        <hr>
                        <div class="text-right mt-3">
                            <button class="btn text-light btn-dark" data-toggle="modal" data-target="#modal5">Read More</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 mt-4 card-deck">
                <div class="card">
                    <img class="card-img-top" src="asset/img/holidays/Varanasi.jpg">
                        <h3 class="m-1 text-center">Varanasi</h3>
                    <div class="card-body">
                        Famously known as Banaras or Kashi, the holy city of Varanasi is located on the banks of river Ganga and is considered one of the holiest cities in India owing to its location and the numerous temples in it.
                        <br><br>
                        <b>Best Time:</b> October to March 
                        <hr>
                        <div class="text-right mt-3">
                            <button class="btn text-light btn-dark" data-toggle="modal" data-target="#modal6">Read More</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 mt-4 card-deck">
                <div class="card">
                    <img class="card-img-top" src="asset/img/holidays/jaisalmer.jpg">
                        <h3 class="m-1 text-center">Jaisalmer</h3>
                    <div class="card-body">
                        Situated close to the Pakistan Border, the Golden City is a major tourist spot owing to its proximity to the Thar Desert. 
                        <br><br>
                        <b>Best Time:</b> October to March 
                        <hr>
                        <div class="text-right mt-3">
                            <button class="btn text-light btn-dark" data-toggle="modal" data-target="#modal7">Read More</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 mt-4 card-deck">
                <div class="card">
                    <img class="card-img-top" src="asset/img/holidays/rishikesh.jpg">
                        <h3 class="m-1 text-center">Rishikesh</h3>
                    <div class="card-body">
                        Situated along the convergence of Ganga and Chandrabhaga, Rishikesh on the foothills of Himalayas is the hub of many ancient temples, popular cafes, yoga ashrams and adventure sports. 
                        <br><br>
                        <b>Best Time:</b>  Throughout the year 
                        <hr>
                        <div class="text-right mt-3">
                            <button class="btn text-light btn-dark" data-toggle="modal" data-target="#modal8">Read More</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 mt-4 card-deck">
                <div class="card">
                    <img class="card-img-top" src="asset/img/holidays/alleppey.jpg">
                        <h3 class="m-1 text-center">Alleppey</h3>
                    <div class="card-body">
                        Famous backwaters of God's own country, Kerela, the city of Alleppey is known for its beaches, temples, boat races and Ayurvedic spa and wellness centers.  
                        <br><br>
                        <b>Best Time:</b>June to March 
                        <hr>
                        <div class="text-right mt-3">
                            <button class="btn text-light btn-dark" data-toggle="modal" data-target="#modal9">Read More</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 mt-4 card-deck">
                <div class="card">
                    <img class="card-img-top" src="asset/img/holidays/Varkala.jpg">
                        <h3 class="m-1 text-center">Varkala</h3>
                    <div class="card-body">
                        Famous for its natural fisheries and springs, Varkala is a coastal town with scenic beaches, lakes, forts, lighthouse and for the samadhi of Kerala's saint Sree Narayana Guru.  
                        <br><br>
                        <b>Best Time:</b> Throughout the year 
                        <hr>
                        <div class="text-right mt-3">
                            <button class="btn text-light btn-dark" data-toggle="modal" data-target="#modal10">Read More</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 mt-4 card-deck">
                <div class="card">
                    <img class="card-img-top" src="asset/img/holidays/Bangalore.jpg">
                        <h3 class="m-1 text-center">Bangalore</h3>
                    <div class="card-body">
                        Having evolved gradually from being the Garden city to the Silicon Valley of India, Bangalore is India's third-largest city. Bangalore is loved for its pleasant weather, beautiful parks and lakes all around the town.  
                        <br><br>
                        <b>Best Time:</b> Throughout the year 
                        <hr>
                        <div class="text-right mt-3">
                            <button class="btn text-light btn-dark" data-toggle="modal" data-target="#modal11">Read More</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 mt-4 card-deck">
                <div class="card">
                    <img class="card-img-top" src="asset/img/holidays/Jodhpur.jpg">
                        <h3 class="m-1 text-center">Jodhpur</h3>
                    <div class="card-body">
                        Known as the ""Gateway to Thar"" , it is famous for its forts, temples, sweets and snacks   
                        <br><br>
                        <b>Best Time:</b> November to February 
                        <hr>
                        <div class="text-right mt-3">
                            <button class="btn text-light btn-dark" data-toggle="modal" data-target="#modal12">Read More</button>
                        </div>
                    </div>
                </div>
            </div>



        </div> <!-- row ends -->
    </div> <!-- container ends -->
</div> <!-- main div ends -->




    <!-- Modal for showing the whole information about the places -->

    <!-- modal 1 for goa -->
    <div class="modal fade" id="first">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                    <h3 class="m-1 text-center">Goa</h3>
                <div class="modal-body">
                    
                       <p> Lying on the west coast, Goa is one of the smallest states in India known for its brilliant beaches, scrumptious food and Portuguese heritage. Panjim, the capital city located in the centre is well-connected with an international airport and roads and trains run from North to South part of Goa.</p>

                       <p> With a coastline stretching for over 100 kilometres, Goa has numerous beaches that attract millions of visitors. While Baga and Calangute are more popular among the Indian family crowd, Anjuna and Arambol draw a lot of foreign tourists. The beaches in South Goa are relatively lesser explored, but some of them like Agonda and Palolem are more beautiful.</p>

                       <p> A former Portuguese colony, Goa also boasts of beautiful architecture from the colonial era with many churches and old-style bungalows. The people are quite friendly towards tourists and celebrate many festivals throughout the year. While the seafood is excellent, Goa has one of the best nightlife in the country with trendy bars, beach shacks, elegant cafes and many clubs and discotheques. Thanks to lower alcohol prices in the state, Goa is also great for younger tourists with relatively tighter pockets.</p>

                </div>
                
            </div>
        </div>
    </div>
    <!-- 1st modal ends -->

    <!-- modal 2 for agra -->
    <div class="modal fade" id="modal2">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                    <h3 class="m-1 text-center">Agra</h3>
                <div class="modal-body">
                        
                        <p>Home to one of the 7 wonders of the world, the Taj Mahal, Agra is a sneak peek into the architectural history with other UNESCO World Heritage Sites as Agra Fort and Fatehpur Sikri. History, architecture, romance all together create the magic of Agra and hence makes for a must-visit for anyone living in or visiting India.</p>

                        <p>Located on the banks of river Yamuna, History fanatics, as well as architecture buffs, can have a ball here with the sheer expanse of the Mughal art and culture on display. Apart from its monuments, the city also has some exciting stuff for foodies - including the famous Agra ka Petha and amazing chaat and Lassi.</p>

                        <p>However, be a little cautious about conmen in the guise of unofficial tour guides and fake handicrafts.</p>

                </div>
                
            </div>
        </div>
    </div>
    <!-- 2nd modal ends -->

     <!-- modal 3 for manali -->
    <div class="modal fade" id="modal3">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                    <h3 class="m-1 text-center">Manali</h3>
                <div class="modal-body">
                    
                    <p>Nestled in between the snow-capped slopes of the Pir Panjal and the Dhauladhar ranges, Manali is one of the most popular hill stations in the country. With jaw-dropping views, lush green forests, sprawling meadows carpeted with flowers, gushing blue streams, a perpetual fairy-tale like mist lingering in the air, and a persistent fragrance of pines and freshness -  Manali has been blessed with extraordinary scenic beauty. From museums to temples, from quaint little hippie villages to bustling upscale streets, river adventures to trekking trails, Manali has every reason to be the tourist magnet it is, all year round.</p>

                    <p>Clean roads, swaying eucalyptus trees, endearing little eateries, small kitschy local market places, and cafes which serve delicious local food at unbelievable prices, Old Manali is a serene, tranquil place, whose lingering silence is broken only by the twittering of the birds and the sound of the roaring waters of the Kullu river.</p>

                    <p>Solang Valley is the of the most visited places in Manali, with the drive up to Solang being as picturesque as the valley itself. Not only does Solang Valley offer some breathtaking views of the surrounding landscape, but its slopes are also a very popular skiing destination, especially during the winters. In summers, the place turns into a paragliding haven. If you're an adventure enthusiast, Solang Valley has adrenaline-pumping activities such as zorbing and horse-riding available.</p>

                    <p>With more than 25 lakh visitors every year, Rohtang Pass easily stands out as one of the most popular scenic spots to visit in Manali. Connecting the Lahaul and Kullu valleys, the Rohtang Pass is famous among nature lovers, photographers and adventure seekers alike. Mountain biking or skiing whilst surrounded by the awe-inspiring glaciers and snow-capped peaks on all sides is an exhilarating experience.</p>

                    <p>Manali is also home to a tiny slice of history, in the form of the Naggar castle. Located among the breathtaking forests in Naggar town, the Naggar Castle is a stunning historical edifice. Once used as the residence of Raja Sidh Singh of Kullu, the castle is a fine blend of traditional Himalayan and European architecture. With majestic fireplaces, beautifully built staircases, and meticulous wood and stone works, the Naggar Castle is a must-visit when you're in Manali.</p>


                </div>
                
            </div>
        </div>
    </div>
    <!-- 3rd modal ends -->

     <!-- modal 4 for jaipur -->
    <div class="modal fade" id="modal4">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                    <h3 class="m-1 text-center">Jaipur</h3>
                <div class="modal-body">

                    <p> Jaipur is a vibrant amalgamation of the old and the new. Also called the Pink City, The capital of the royal state of Rajasthan, Jaipur has been ruled by Rajput kingdoms for many centuries and developed as a planned city in the 17th century AD. Along with Delhi and Agra, Jaipur forms the Golden Triangle, one of the most famous tourist circuits of the country.</p>

                    <p>With the old city surrounded by walls and gates decorated with drawings on the backdrop of a beautiful pink hue, Jaipur, the pink city successfully manages to retain its old world charm. Home to a few UNESCO World Heritage sites including Amer Fort and Jantar Mantar, Jaipur is home to many magnificent forts, palaces, temples and museums. Jaipur is filled to the brim with bustling local bazaars where you can shop for local handicrafts and trinkets to your heart's content. Popular bazaars in the city include Bapu Bazaar, Tripolia Bazaar and Johri Bazaar. Jaipur is also very well known for its local food and the most famous dishes include the Ghewar, Pyaaz Kachori and Dal Baati Churma.</p>

                    
                    <p>One of the largest cities in India, Jaipur is also home to all the modern amenities with some of the most exotic hotels and resorts in the world. The city boasts an international airport and is also very well connected by rail and road. The metro, local buses, shared tuk-tuks, auto-rickshaws and taxi aggregator apps including Uber and Ola solve the commute problem in the city quite comfortably. It's quite interesting to see the highly urbanised pockets and shopping areas have casually sprung up beside gleaming forts and palaces.</p>

                    <p>Majestic buildings, tales of heroic battles, resplendent forts and palaces, and multi-faceted characters, Jaipur has long been one of the shiniest cultural jewels in the history of the Indian subcontinent. With friendly people known for their hospitality, Jaipur offers a plethora of options for travellers.</p>
                       
                </div>
                
            </div>
        </div>
    </div>
    <!-- 4th modal ends -->

     <!-- modal 5 for udaipur -->
    <div class="modal fade" id="modal5">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                    <h3 class="m-1 text-center">Udaipur</h3>
                <div class="modal-body">
                    
                    <p>Udaipur, also known as the City of Lakes, is the crown jewel of the state of Rajasthan. It is surrounded by the beautiful Aravalli Hills in all directions, making this city as lovely as it is. This 'Venice of the East' has an abundance of natural beauty, mesmerising temples and breathtaking architecture which makes it a must-visit destination in India.  A boat ride through the serene waters of Lake Pichola will be enough to prove to you why Udaipur is the pride of Rajasthan.</p>

                    <p>Located in a valley and surrounded by four lakes, Udaipur has natural offerings with a grandeur multiplied by human effort, to make it one of the most enchanting and memorable tourist destinations. It justifies all names ever offered to its charm from 'Jewel of Mewar' to 'Venice of the East'. And though the entire city's architecture is flattering, the Lake Palace hotel is something that offers the city a visual definition. The revered Nathdwara temple is about 60 km from Udaipur.</p>
   

                </div>
                
            </div>
        </div>
    </div>
    <!-- 5th modal ends -->

     <!-- modal 6  -->
    <div class="modal fade" id="modal6">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                    <h3 class="m-1 text-center">Varanasi</h3>
                <div class="modal-body">
                     <p>World's oldest living city, Varanasi enchants and surprises its visitors in the same breath. Also known as Kashi (City of Life) and Benaras, this spiritual capital of India is one of Hinduism's seven holy cities. The old city of Varanasi sits along the western banks of the Ganges, spread across a labyrinth of alleys called galis which are too narrow for the traffic to pass through - be prepared to walk on foot and encounter some holy cows! There are temples at almost every turn in Varanasi, but the Kashi Vishwanath Temple is the most visited and the oldest of the lot (Benaras is known as the city of Lord Shiva for a reason, and rightfully so).</p>

                    <p>Varanasi is considered an auspicious place to die, as it is believed to grant moksha or liberation from the cycle of life and death. Spiritually enlightening and spectacularly photogenic, the heart of the city pulsates around the ghats, about 80 of which border the Ganges - be prepared for the sights, sounds and smells! All chaos and noise on the ghats take a pause when the Ganga Aarti takes place after dusk, a ceremony of immense grandeur. This divine city is also an important destination for Buddhists. Gautam Buddha preached his modal7 sermon in Banaras, a part which is now in Sarnath. Typical of any Indian city, the food here is a delicious repertoire of dishes - don't miss out on the hot chaat and cool lassi.</p>

                    <p>The journey through Banaras will blaze in your memory, long after you've left its shore! Varanasi is India in all her glory, as it has been for thousands of years, and as it will be for a thousand more.</p>
                       

                </div>
                
            </div>
        </div>
    </div>
    <!-- 6th modal ends -->

     <!-- modal 7 -->
    <div class="modal fade" id="modal7">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                    <h3 class="m-1 text-center">Jaisalmer</h3>
                <div class="modal-body">
                    <p>Jaisalmer is a major tourist spot located in the northwestern state of Rajasthan in India. It is known as the 'golden city' due to its bounteous golden dunes and castles clad in golden honey sandstone. Jaisalmer is adorned with lakes, ornate Jain temples and havelis. Climb on to the camel saddle and make your way through this desert or camp under the night sky in this golden land for an unforgettable experience.</p>

                    <p>The Jaisalmer Fort stands as a citadel and is surrounded by narrow alleys inhabited by people residing there for generations. With shops selling colourful handicrafts and havelis that will make you travel back in time, Jaisalmer is an amalgam of exotic Indian desert culture, heritage and adventure.</p>
                       

                </div>
                
            </div>
        </div>
    </div>
    <!-- 7th modal ends -->

     <!-- modal 8  -->
    <div class="modal fade" id="modal8">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                    <h3 class="m-1 text-center">Rishikesh</h3>
                <div class="modal-body">
                        <p>Located in the foothills of the Himalayas along the convergence of Ganga and Chandrabhaga River, Rishikesh (also called as Hrishikesh) is known for its adventure activities, ancient temples, popular cafes and as the "Yoga Capital of the World". With whitewater rafting industry growing and varied camping and cafe spots springing up, Rishikesh has grown immensely as a favourite, catering to people with different needs.</p>

                        <p>Over the years, the tranquil town has become extremely popular as the top spiritual destination in the world, especially after the Beatles association with Maharishi Mahesh Yogi here in the late '60s. As it lies on the holy banks of river Ganga, Rishikesh has been a hub of Sadhus (saints) with numerous ashrams teaching spirituality, yoga, meditation and Ayurveda springing up, the most popular of which is the Beatles Ashram.</p>

                        <p>With the influx of tourists, there has been a surge in the number of cafes and restaurants in the town. However, in the last few years, Rishikesh has also been developed as the hub of Adventure Sports in India as there is a multitude of options including White Water Rafting, Bungee Jumping, Flying Fox, and Mountain Biking among others. It also serves as the gateway to many Himalayan treks and is used as a popular camping site making it a beautiful melange of spiritual and adrenaline-pumping experiences. Rishikesh also holds the International Yoga Festival in the modal10 week of March which sees yoga enthusiasts from all over the globe.</p>

                               

                </div>
                
            </div>
        </div>
    </div>
    <!-- 8th modal ends -->

     <!-- modal 9 -->
    <div class="modal fade" id="modal9">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                    <h3 class="m-1 text-center">Alleppey</h3>
                <div class="modal-body">
                        
                    <p>Officially called Alappuzha, Alleppey is a city in the South Indian state of Kerala. Bordering the Laccadive Sea, it is known for its wide network of interlinking, palm-fringed canals called backwaters and rejuvenating Ayurvedic resorts.</p>

                    <p>Allepey is also popular for its Houseboat cruises that pass through the serene backwaters, where you can catch glimpses of green paddy fields, choir making activities, beautiful avifauna and witness the life of locals in Kerala. Towards the shore lies the Alleppey beach in the Arabian Sea, a beautiful example of the gems you’d find along the Malabar Coast. The appeal of this beach is only amplified by the history attached to it, and a walk down the 137-year old pier is a must. Be sure to catch a traditional snake boat race in the months of August and September and try out some toddy (palm wine) at a local toddy shop for adding a touch of authenticity to your travel experience in Allepey.</p>
                
                           

                </div>
                
            </div>
        </div>
    </div>
    <!-- 9th modal ends -->

     <!-- modal 10 -->
    <div class="modal fade" id="modal10">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                    <h3 class="m-1 text-center">Varkala</h3>
                <div class="modal-body">
                    
                        <p>Varkala is a coastal town in the southern part of Kerala known for the unique 15m high 'Northern Cliff' adjacent to the Arabian Sea. It is popular for its hippie culture, shacks on the cliff serving great seafood and playing global music and the samadhi of Kerala's saint Sree Narayana Guru. Varkala is also known for Jardana Swami Temple, also known as Dakshin Kashi.</p>

                        <p>Varkala has some of the best pristine beaches, hills, lakes, forts, lighthouses, natural fisheries and springs - all of this together makes this town a little paradise. You will also find a lot of shops with signboards in Hebrew selling Yoga mats, oxidised silver jewellery and harem pants made of cotton. Ayurvedic spas, affordable resorts, hostels, clean beaches make it a must-visit city of Kerala.</p>

                </div>
                
            </div>
        </div>
    </div>
    <!-- 10th modal ends -->

     <!-- modal 11 -->
    <div class="modal fade" id="modal11">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                    <h3 class="m-1 text-center">Bangalore</h3>
                <div class="modal-body">
                    
                    <p>Having evolved gradually from being the Garden city to the Silicon Valley of India, Bangalore is India's third-largest city. Bangalore is loved for its pleasant weather, beautiful parks and lakes all around the town.</p>

                    <p>When in Bangalore, one can choose to take a long, stroll through the greenery of Cubbon Park, shop in many modern malls or street side markets or hop into one of the several acclaimed craft breweries in the city for a cold and refreshing drink. Bangalore had come to be renowned for its eateries, street food corners, quirky cafes, coffee roasters and pubs dotting every corner of the city, serving cuisines from all over the world. Brunches, buffets, burgers, rooftop cafes, late-night eats - Bangalore has it all.</p>

                    <p>However, the unprecedented growth of IT in Bangalore has reshaped quite a few things including rising temperatures, polluted lakes and heavily congested roads, especially in the newer areas.</p>

                    <p>Aside from the central business and commercial districts (and the roads leading up to them), the neighbourhoods of Bangalore are mostly quiet and serene, especially the older parts of the city. There's still the early-morning cacophony of street vendors ambling down the streets with carts, selling fresh fruits and vegetables. There are a huge number of beautifully decorated parks in the city that are ideal for going on a morning stroll or a jog. One walk through the 300-acre Cubbon Park, or the botanical gardens of Lalbagh, and you'll know precisely why Bangalore is so famously called India's 'Garden City'.</p>


                </div>
                
            </div>
        </div>
    </div>
    <!-- 11th modal ends -->

     <!-- modal 12 -->
    <div class="modal fade" id="modal12">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                    <h3 class="m-1 text-center">Jodhpur</h3>
                <div class="modal-body">
                    
                        <p>Also known as the "The Blue City", "Sun City" and "Gateway to Thar", Jodhpur is famous for its Mehrangarh fort, blue houses, temples, sweets and snacks. Apart from the fort, there are multiple temples, lakes, shopping streets that are like a mirage from a bygone era.</p> 

                        <p>The former capital of Marwar, Jodhpur is one of the most enchanting cities of Rajasthan, with its mighty Mehrangarh fort overlooking the city. The city is called the Blue City as it looks completely blue in colour from an aerial view because of its blue walls and blue houses. Nearby Jaswant Tada and Umaid Bhawan Palace are also among the top attractions in Jodhpur. However, the magic lies in the old city itself with hundreds of shops, guesthouses, eating joints and vendors make it a chirpy bustling city, especially near the landmark clock tower and Sardar Market.</p>

                        <p>Seen in the backdrop of the movie, The Dark Knight Rises, Jodhpur attracts hundreds of thousands of visitors from all over the world. Jodhpur is conveniently located in the centre of Rajasthan making it easier for people visiting Jodhpur to explore other destinations of the state</p>

                </div>
                
            </div>
        </div>
    </div>
    <!-- 12 modal ends -->

     <!-- modal 13 -->
    <!-- <div class="modal fade" id="modal13">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                    <h3 class="m-1 text-center">Goa</h3>
                <div class="modal-body">
                    
                       

                </div>
                
            </div>`
        </div>
    </div> -->
    <!-- 13th modal ends -->

    <!-- Footer -->
    <?php include('footer.html') ?>
	
</body>
</html>