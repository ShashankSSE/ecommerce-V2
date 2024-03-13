@extends('components.app')
@section('title', 'Patakah | Services')
@section('meta_description', '')
@section('meta_keywords','')
@section('content')

        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="position-relative d-inline text-primary ps-4">Our Services</h6>
                    <h2 class="mt-2">What Services We Provide</h2>
                </div>
                <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="col-12 text-center">
                        <ul class="list-inline mb-5" id="portfolio-flters">
                            <li class="btn px-3 pe-4 active" data-filter="*">All</li>
                            <li class="btn px-3 pe-4" data-filter=".first">Learning Management Solution</li>
                            <li class="btn px-3 pe-4" data-filter=".second">Mock Test/Assessment</li>
                            <li class="btn px-3 pe-4" data-filter=".third">Gyan Sangam/Doubt Solver</li>
                            <li class="btn px-3 pe-4" data-filter=".fourth">CTO as a Service</li>
                        </ul>
                    </div>
                </div>
                <div class="row g-4 portfolio-container">
                    <div id="lms" class="col-lg-12 col-md-12 portfolio-item first wow zoomIn" data-wow-delay="0.1s" style="    margin-top: 70px;border-bottom: 2px solid #cccccc8f; padding-bottom:50px;">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="position-relative rounded overflow-hidden" style="    box-shadow: 0px 0px 14px 4px #ccc;">
                                    <img class="img-fluid w-100" src="{{asset('assets/img/lms.jpg')}}" alt="">                             
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <center><h2>Learning Management Solutions</h2></center>
                                <!-- <div class="items">
                                    <ul>
                                        <li>Unlimited LIVE lecture </li>
                                        <li>Unlimited VOD (Recorded) Lecture</li>
                                        <li>100% customisation</li>
                                        <li>Bank payment gateway intigration + other</li>                                        
                                    </ul>
                                    <ul>
                                        <li>Android/IOS application</li>
                                        <li>Hosted on client's server</li>
                                        <li>Validity: Lifetime</li>
                                        <li>Unlimited Instant manual unlock</li>
                                        <li>Secure platform</li>
                                    </ul>
                                </div> -->
                                <div class="accordion"> 
                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion1">
                                        <label for="accordion1" class="accordion-item-title"><span class="icon"></span>Live/Vod Streaming</label>
                                        <div class="accordion-item-desc"> Institution can conduct unlimited live and video-on-demand (VOD) classes, providing flexibility and accessibility for seamless teaching and learning experiences.</div>
                                    </div>
                                
                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion2">
                                        <label for="accordion2" class="accordion-item-title"><span class="icon"></span>Course Builder</label>
                                        <div class="accordion-item-desc">Can make "N" number of courses hassle free in few clicks to build your courses and make the live for your audiances.</div>
                                    </div>
                                
                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion3">
                                        <label for="accordion3" class="accordion-item-title"><span class="icon"></span>Private Chats</label>
                                        <div class="accordion-item-desc">Private chat ensures confidential communication, fostering trust, security, and personalized interaction, enhancing collaboration and engagement for effective communication.</div>
                                    </div>
                                
                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion4">
                                        <label for="accordion4" class="accordion-item-title"><span class="icon"></span>Discussion Forum</label>
                                        <div class="accordion-item-desc">Discussion forums promote collaborative learning, knowledge sharing, diverse perspectives, and community engagement, fostering a dynamic and interactive learning environment to solve the query/doubt of candidates easily.</div>
                                    </div>                  
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-sm-7">
                                <div class="accordion">  
                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion5">
                                        <label for="accordion5" class="accordion-item-title"><span class="icon"></span>Study Material</label>
                                        <div class="accordion-item-desc">You can deliver pdf, pptx and docs to your audience in the form of study material.</div>
                                    </div>
                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion6">
                                        <label for="accordion6" class="accordion-item-title"><span class="icon"></span>Own Secure server</label>
                                        <div class="accordion-item-desc">Own secure server ensures data control, privacy, and protection, reducing vulnerabilities and providing a reliable, confidential platform for operations with long term cost saving.</div>
                                    </div>
                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion7">
                                        <label for="accordion7" class="accordion-item-title"><span class="icon"></span>Custom Payment Gateway</label>
                                        <div class="accordion-item-desc">Institution can integrate multiple payment gateway as per their business requirement. We can integrate major payment gateway including strip and any bank's gateway.</div>
                                    </div>
                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion8">
                                        <label for="accordion8" class="accordion-item-title"><span class="icon"></span>Reports</label>
                                        <div class="accordion-item-desc">Detailed reports of a candidate offer comprehensive insights, aiding informed decisions. Benefits include assessing skills, experience and many deep reports.</div>
                                    </div>
                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion9">
                                        <label for="accordion9" class="accordion-item-title"><span class="icon"></span>Notification</label>
                                        <div class="accordion-item-desc"></div>
                                    </div>                                
                                </div>
                            </div>
                            <div class="col-sm-5 text">                                
                                <p>With our LMS, educational institutes can improve student engagement, enhance learning outcomes, and optimize their operations. Join the future of education with Patakah.</p>
                            </div>
                        </div>
                    </div>
                    <div id="test" class="col-lg-12 col-md-12  portfolio-item second " data-wow-delay="0.3s" style="    margin-top: 70px;border-bottom: 2px solid #cccccc8f; padding-bottom:50px;">
                        <div class="row">
                            <div class="col-sm-7">
                                <center><h2>Mock Test/Assessment</h2></center> 
                                <div class="accordion"> 
                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion10">
                                        <label for="accordion10" class="accordion-item-title"><span class="icon"></span>Create Mock Tests</label>
                                        <div class="accordion-item-desc">Create mock tests in a minute through bulk upload of thousands of questions in one go.</div>
                                    </div>
                                
                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion11">
                                        <label for="accordion11" class="accordion-item-title"><span class="icon"></span>Web/App Based Assessment</label>
                                        <div class="accordion-item-desc">Take test through your branded website or Mobile app</div>
                                    </div>
                                
                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion12">
                                        <label for="accordion12" class="accordion-item-title"><span class="icon"></span>Video Solutions</label>
                                        <div class="accordion-item-desc">Create video soutions for your audience, keep them engaged.</div>
                                    </div>
                                
                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion13">
                                        <label for="accordion13" class="accordion-item-title"><span class="icon"></span>Detail Reports</label>
                                        <div class="accordion-item-desc">Administrator can get various kind of test report about their candidates.</div>
                                    </div>                  
                                </div>
                                <div class="text">                                
                                    <p>Online mock tests offer flexible, accessible exam practice. They enhance preparation, simulate real test conditions, provide instant feedback, and empower learners to identify and address their weaknesses effectively.</p>
                                </div>  
                            </div>
                            <div class="col-sm-5">
                                <div class="position-relative rounded overflow-hidden" style="    box-shadow: 0px 0px 14px 4px #ccc;">
                                    <img class="img-fluid w-100" src="{{asset('assets/img/test.jpg')}}" alt="">                             
                                </div>
                            </div>
                            
                        </div> 
                    </div>
                    <div id="doubt" class="col-lg-12 col-md-12  portfolio-item third " data-wow-delay="0.6s" style="    margin-top: 70px;border-bottom: 2px solid #cccccc8f; padding-bottom:50px;">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="position-relative rounded overflow-hidden" style="    box-shadow: 0px 0px 14px 4px #ccc;">
                                    <img class="img-fluid w-100" src="{{asset('assets/img/test.jpg')}}" alt="">                             
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <center><h2>Doubt Solver</h2></center> 
                                <div class="accordion"> 
                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion14">
                                        <label for="accordion14" class="accordion-item-title"><span class="icon"></span>Solutions Upload</label>
                                        <div class="accordion-item-desc">Institution can upload unlimited solutions in the form of Video, Audio, Text and Image.</div>
                                    </div>
                                
                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion15">
                                        <label for="accordion15" class="accordion-item-title"><span class="icon"></span>Voice Recognition</label>
                                        <div class="accordion-item-desc">Student has to ask only through voice their doubt, they will get solutions within seconds.</div>
                                    </div>
                                
                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion16">
                                        <label for="accordion16" class="accordion-item-title"><span class="icon"></span>Text Recognition</label>
                                        <div class="accordion-item-desc">Type-search and get the solution in a very easy way.</div>
                                    </div>
                                
                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion17">
                                        <label for="accordion17" class="accordion-item-title"><span class="icon"></span>Details Reports</label>
                                        <div class="accordion-item-desc">Click the problem and upload image for the best possible solutions from the app.</div>
                                    </div>                  
                                </div>
                                <div class="text">                                
                                    <p>Doubt solver apps offer instant clarification, fostering understanding and confidence. They provide personalized learning, prompt assistance, and empower users to overcome challenges in real-time, enhancing educational experiences.</p>
                                </div>  
                            </div>
                            
                        </div> 
                    </div> 
                    <div id="cto" class="col-lg-12 col-md-12  portfolio-item fourth " data-wow-delay="0.3s" style="    margin-top: 70px;border-bottom: 2px solid #cccccc8f; padding-bottom:50px;">
                        <div class="row">
                            <div class="col-sm-7">
                                <center><h2>CTO as a service</h2></center>  
                                <div class="accordion"> 
                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion18">
                                        <label for="accordion18" class="accordion-item-title"><span class="icon"></span>Product Development and Scalability</label>
                                        <div class="accordion-item-desc">Patakah play a crucial role in product development. We guide the development team, ensuring the creation of robust, scalable, and innovative products that meet your business needs and market demands.</div>
                                    </div>
                                
                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion19">
                                        <label for="accordion19" class="accordion-item-title"><span class="icon"></span>Financial Efficiency</label>
                                        <div class="accordion-item-desc">Outsourcing reduces teach department costs, providing access to skilled professionals without the overhead of full-time employees.</div>
                                    </div>
                                
                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion20">
                                        <label for="accordion20" class="accordion-item-title"><span class="icon"></span>Flexibility</label>
                                        <div class="accordion-item-desc"> Companies can scale resources up or down based on project requirements, ensuring optimal resource utilization.</div>
                                    </div>
                                
                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion21">
                                        <label for="accordion21" class="accordion-item-title"><span class="icon"></span>Specialized Skills</label>
                                        <div class="accordion-item-desc">Access to a pool of experts ensures high-quality work, tapping into diverse skills not available in-house.</div>
                                    </div>       
                                    
                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion22">
                                        <label for="accordion22" class="accordion-item-title"><span class="icon"></span>Focus on Core Competencies</label>
                                        <div class="accordion-item-desc">By outsourcing non-core functions, you can concentrate on your academy and marketing strategic activities that is your core competencies.</div>
                                    </div>       
                                    
                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion23">
                                        <label for="accordion23" class="accordion-item-title"><span class="icon"></span> Strategic Leadership</label>
                                        <div class="accordion-item-desc">Hiring a CTO as a service brings 	strategic leadership to your organization. We guide technology decisions aligned with business goals and long-term vision. </div>
                                    </div>       
                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion24">
                                        <label for="accordion24" class="accordion-item-title"><span class="icon"></span>Continuous Improvement </label>
                                        <div class="accordion-item-desc">We drive a culture of continuous improvement, encouraging regular assessments and refinements to enhance the efficiency and effectiveness of technological processes for your organization </div>
                                    </div>                  
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="position-relative rounded overflow-hidden" style="    box-shadow: 0px 0px 14px 4px #ccc;">
                                    <img class="img-fluid w-100" src="{{asset('assets/img/test.jpg')}}" alt="">                             
                                </div>
                            </div>
                            
                            <div class="text" style="    margin-top: 20px;">                                                                 
                                <p>The alternative to hiring such a costly specialist in-house is opting for a CTO as a Service. This could be an advantageous move that can bring with multiple benefits, from project planning, execution, and maintenance to team formation, innovation adoption, code quality audits, scaling, and so much more.</p>
                            </div>  
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->

<script>
    $(document).ready(function(){
        $("#hero-header").hide();
        $("#newsletter").hide();
        $("#services-hero").show();
    })
</script>
@endsection