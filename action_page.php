<!DOCTYPE html>
<html>
    <head>
        <title>Noi'i Kanawai (Law Lookup)</title>
        <style>
            body {
                background-image:url();
                background-color: white;
                text-align: center;
                padding-top: 100px;
            }
            h1 {
                font-family: cursive, serif;
            }
            h5{
                font-family: cursive, serif;
            }

    /*background*/
            html {
                width: 100%;
              height: 200%;
              display: block;
              position: relative;
            }
        
            html::after {
              content: "";
              background: url(http://www.hawaiiantravel.com/web/images/maui.jpg);
              opacity: 0.25;
              background-size: cover;
              background-repeat: no-repeat;
              top: 0;
              left: 0;
              bottom: 0;
              right: 0;
              position: absolute;
              z-index: -1;   
            }
    /* for the accordion */
            .accordion {
                font-family:"Courier New"; 
                margin:10 auto;
                font-size:14px;
                width:450px;
                padding:50px;
            }
            .accordion [type=radio], .accordion [type=checkbox] {
                display:none;
            }
            .accordion label {
                text-align: left;
                display:block;
                font-size:16px;
                line-height:15px;
                background:rgb(255, 250, 205);
                border:1px solid #542437;
                color:#222222;
                text-shadow:1px 1px 1px rgba(255,255,255,0.3);
                font-weight:700;
                cursor:pointer;
                
                -webkit-transition: all .2s ease-out;
                -moz-transition: all .2s ease-out;
            }

            .accordion .content {
                padding:0 10px;
                overflow:hidden;
                border:1px solid #fff; /* Make the border match the background so it fades in nicely */
                -webkit-transition: all .5s ease-out;
                -moz-transition: all .5s ease-out;
            }
            /* Vertical */
            .vertical ul li {
                overflow:hidden;
                margin:0 0 1px;
            }
            .vertical ul li label {
                padding:10px;
            }
            .vertical [type=radio]:checked ~ label, .vertical [type=checkbox]:checked ~ label {
                border-bottom:0;
            }
            .vertical ul li label:hover {
                border:1px solid #542437; /* We don't want the border to disappear on hover */
            }
            .vertical ul li .content {
                height:0px;
                border-top:0;
            }
                display:none;
            }
            .bar {
                padding-bottom: 50px;
            }
            #statute {
                width: 75%;
            }
    </style>
    </head>
    <body>
      <div class="container">
        <h1>Noiʻi Kānāwai</h1>
        <h5>Law Lookup</h5>
        
  
        <!--- Search Bar -->
        <div class="bar">
        <form action="/action_page.php" method="get">
                <input type="text" name="searchbar" id="statute" placeholder="Type Statute Number">
                <input type="submit">
        </form>

        <script>
            var search = '<?php echo $_GET["searchbar"]; ?>';
            var theLink = linkBuilder(search);
            
            window.onload = function() {
                document.getElementById("statute").innerHTML=theLink;
            } 
        </script>
        
        <a id="statute" href='linkBuilder(theLink)' target="iframe_a"></a>
         </div>
         
        <div>
        <iframe src='linkBuilder(theLink)' height=70% width=80% style="border:2px solid green;" name="iframe_a"></iframe>
        </div>
        
        
         <!--- building the link -->
        <script>
            function pad4(decimal) {
                  z = '0';
                  n = decimal + '';
                  return n.length >= 4 ? n : new Array(4 - n.length + 1).join(z) + n;
            }
            function linkBuilder(searchbar){

            //part 2a- is it special
                if(searchbar.toUpperCase().includes("USCON")){
                    var special=true;
                    var partTwo="01-USCON";
                    if(searchbar.toUpperCase().includes("AM"))
                    {
                        var last="USCON_AM-";
                    }
                    else
                    {
                        var last="USCON_";
                    }
                    
                } else if(searchbar.toUpperCase().includes("HNP")){
                    var special=true;
                    var partTwo="02-HNP";
                    var last="HNP_";
                } else if(searchbar.toUpperCase().includes("ORG")){
                    var special=true;
                    var partTwo="03-ORG";
                    var last="ORG_";
                } else if(searchbar.toUpperCase().includes("ADM")){
                    var special=true;
                    var partTwo="04-ADM";
                    var last="ADM_";
                } else if(searchbar.toUpperCase().includes("CONST")){
                    var special=true;
                    var partTwo="05-Const";
                    var last="CONST_";
                } else if(searchbar.toUpperCase().includes("HHCA")){
                    var special=true;
                    var partTwo="06-HHCA";
                    var last="HHCA_";
                } else {
                    var special=false;
                    var partTwo="HRS";
                    var last="HRS_"
                }
            //part 3a, chapter
                var a = 0;
                var b = 1;
                var chapter = "";
                var chapterLetter = "";
                var Page2 = "";
                var page = "";
                while(!isNaN(searchbar.substring(a, b)))
                {
                    chapter += searchbar.substring(a, b);
                    if(searchbar.substring(a, b) != searchbar.substring(searchbar.length-1, searchbar.length))
                    {   
                        a++;
                        b++;
                    }
                    else
                    {
                        break;
                    }
                }
                
            //part 3b, if there is a letter
                if(isNaN(searchbar.substring(a, b)) && searchbar.substring(a, b) != "-")
                {
                    chapterLetter += searchbar.substring(a, b);
                    if(searchbar.substring(a+1, b+1)=="-")
                    {
                        a++; b++;
                    }
                } 
                

                if(searchbar.includes("-"))
                {
                    a++; b++;
            //part 3c, if there is a page
                    
                    while(searchbar.length != b-1 && !isNaN(searchbar.substring(a, b)) && searchbar.substring(a, b) != "-")
                    {
                        page += searchbar.substring(a, b);
                        a++;
                        b++;
                    }
            //if there's a second part
                    Page2 = "";
                    if(searchbar.substring(a, b) == "-" || searchbar.substring(a, b) == ".")
                    {
                        a++; b++;
                        while(searchbar.length != b - 1)
                        {
                            Page2 += searchbar.substring(a, b);
                            a++; b++;
                        }
                    }
                }
            //part 2b- if not, whats the actual part 2
                if(!special){
                    partTwo = partTwo+pad4(chapter)+chapterLetter;
                }
            //Page number for special cases:
                sPage = "";
                sPage2 = ""
                a = 0;
                b = 1;
                while(isNaN(searchbar.substring(a, b)))
                {
                    a++; b++;
                }
                while(!isNaN(searchbar.substring(a,b)) && searchbar.length != b - 1)
                {
                    sPage += searchbar.substring(a, b);
                    a++; b++;
                }
            //if there is second part to the page number
                if(searchbar.substring(a, b) == "-")
                {
                    a++; b++;
                    while(searchbar.length != b - 1)
                    {
                        sPage2 += searchbar.substring(a, b);
                        a++; b++;
                    }
                }
            //part 1, volume (this looks like cancer its not)
            //correct that^^. This entire thing is actually cancer.
                var partOne="";
                if(special){
                    var volume="Vol01_Ch0001-0042F";
                } else if(chapter>0 && chapter<46){
                    partOne+="Vol01_Ch0001-0042F";
                } else if(chapter>=046 && chapter<121){
                    partOne+="Vol2_Ch0046-0115";
                } else if(chapter>=121 && chapter<201){
                    partOne+="Vol03_Ch0121-0200D";
                } else if(chapter>=201 && chapter<261){
                    partOne+="Vol04_Ch0201-0257";
                } else if(chapter>=261 && chapter<321){
                    partOne+="Vol05_Ch0261-0319";
                } else if(chapter>=321 && chapter<346){
                    partOne+="Vol06_Ch0321-0344";
                } else if(chapter>=346 && chapter<401){
                    partOne+="Vol07_Ch0346-0398";
                } else if(chapter>=401 && chapter<0431){
                    partOne+="Vol08_Ch0401-0429";
                } else if(chapter>=431 && chapter<436){
                    partOne+="Vol09_Ch0431-0435H";
                } else if(chapter>=436 && chapter<476){
                    partOne+="Vol10_Ch0436-0474";
                } else if(chapter>=476 && chapter<501){
                    partOne+="Vol11_Ch0476-0490";
                } else if(chapter>=501 && chapter<601){
                    partOne+="Vol12_Ch0501-0588";
                } else if(chapter>=601 && chapter<701){
                    partOne+="Vol13_Ch0601-0676";
                } else {
                    partOne+="Vol14_Ch0701-0853";
                } 

                if(!special)
                {
                    var partThree=last+pad4(chapter)+chapterLetter+"-"+pad4(page);
                }
                else
                {
                    var sPartThree = last+pad4(sPage);
                }

                if(pad4(page) == 0000 && !special)
                {
                    partThree=last+pad4(chapter)+chapterLetter+"-";
                }
                else if(pad4(sPage) == 0000 && special)
                {
                    last = last.substring(0, last.length - 1);
                    sPartThree=last+"-";
                }


                if(!special && Page2 != "")
                {
                     var link="http://www.capitol.hawaii.gov/hrscurrent/"+partOne+"/"+partTwo+"/"+partThree+"_"+pad4(Page2)+".htm";
                }
                else if(sPage2 != "" && partTwo == "06-HHCA")
                { 
                    var link="http://www.capitol.hawaii.gov/hrscurrent/"+volume+"/"+partTwo+"/"+last+pad4(sPage)+"_"+pad4(sPage2)+".htm";
                }
                else if(sPage2 != "" && (partTwo == "05-Const" || partTwo == "01-USCON"))
                {
                    var link="http://www.capitol.hawaii.gov/hrscurrent/"+volume+"/"+partTwo+"/"+last+pad4(sPage)+"-"+pad4(sPage2)+".htm";
                }
                else if(!special)
                {
                    var link="http://www.capitol.hawaii.gov/hrscurrent/"+partOne+"/"+partTwo+"/"+partThree+".htm";
                }
                else
                {
                    var link="http://www.capitol.hawaii.gov/hrscurrent/"+volume+"/"+partTwo+"/"+sPartThree+".htm";
                }
                return link;   
            }

        </script>
        
        
      </div> 
   </body>
</html>
