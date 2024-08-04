        const o1 =document.getElementById("o1");
        const o1check =document.getElementById("o1check");
        const o2 =document.getElementById("o2");
        const o2check =document.getElementById("o2check");
        const o3 =document.getElementById("o3");
        const o3check =document.getElementById("o3check");
        const o4 =document.getElementById("o4");
        const o4check =document.getElementById("o4check");
        const nextBtn = document.getElementById("next-btn");
        let totalQuestion=0;
        let score=0;
        function checkOption1(){
            var score = localStorage.getItem("score");
            var totalQ = localStorage.getItem("totalQ");
            var totalQAll = localStorage.getItem("totalQAll");
            var scoreAll = localStorage.getItem("scoreAll");
            totalQAll++;
            totalQ++;
            o1.disabled = true;
            o2.disabled = true;
            o3.disabled = true;
            o4.disabled = true;
            if(o1check.innerHTML=="true"){
                o1.style.backgroundColor = "#9aeabc" //green;
                score++;
                scoreAll++;
            }else{
                o1.style.backgroundColor = "#ff9393" //red;
                if(o2check.innerHTML=="true"){
                    o2.style.backgroundColor = "#9aeabc" //green;
                }
                else if(o3check.innerHTML=="true"){
                    o3.style.backgroundColor = "#9aeabc" //green;
                }
                else if(o4check.innerHTML=="true"){
                    o4.style.backgroundColor = "#9aeabc" //green;
                }

            }
            nextBtn.style.display = "Block";
            localStorage.setItem("totalQ", totalQ);
            localStorage.setItem("score", score);
            localStorage.setItem("scoreAll",scoreAll);
            localStorage.setItem("totalQAll",totalQAll);
            
        }
        function checkOption2(){
            var score = localStorage.getItem("score");
            var totalQ = localStorage.getItem("totalQ");
            var totalQAll = localStorage.getItem("totalQAll");
            var scoreAll = localStorage.getItem("scoreAll");
            totalQAll++;
            totalQ++;
            o1.disabled = true;
            o2.disabled = true;
            o3.disabled = true;
            o4.disabled = true;
            if(o2check.innerHTML=="true"){
                o2.style.backgroundColor = "#9aeabc" //green;
                score++;
                scoreAll++;
            }else{
                o2.style.backgroundColor = "#ff9393" //red;
                if(o1check.innerHTML=="true"){
                    o1.style.backgroundColor = "#9aeabc" //green;
                }
                else if(o3check.innerHTML=="true"){
                    o3.style.backgroundColor = "#9aeabc" //green;
                }
                else if(o4check.innerHTML=="true"){
                    o4.style.backgroundColor = "#9aeabc" //green;
                }
            }
            nextBtn.style.display = "Block";
            localStorage.setItem("totalQ", totalQ);
            localStorage.setItem("score", score);
            localStorage.setItem("scoreAll",scoreAll);
            localStorage.setItem("totalQAll",totalQAll);
        }
        function checkOption3(){
            var score = localStorage.getItem("score");
            var totalQ = localStorage.getItem("totalQ");
            var totalQAll = localStorage.getItem("totalQAll");
            var scoreAll = localStorage.getItem("scoreAll");
            totalQAll++;
            totalQ++;
            o1.disabled = true;
            o2.disabled = true;
            o3.disabled = true;
            o4.disabled = true;
            if(o3check.innerHTML=="true"){
                o3.style.backgroundColor = "#9aeabc" //green;
                score++;
                scoreAll++;
            }else{
                o3.style.backgroundColor = "#ff9393" //red;
                if(o1check.innerHTML=="true"){
                    o1.style.backgroundColor = "#9aeabc" //green;
                }
                else if(o2check.innerHTML=="true"){
                    o2.style.backgroundColor = "#9aeabc" //green;
                }
                else if(o4check.innerHTML=="true"){
                    o4.style.backgroundColor = "#9aeabc" //green;
                }
            }
            nextBtn.style.display = "Block";
            localStorage.setItem("totalQ", totalQ);
            localStorage.setItem("score", score);
            localStorage.setItem("scoreAll",scoreAll);
            localStorage.setItem("totalQAll",totalQAll);
        }
        function checkOption4(){
            var score = localStorage.getItem("score");
            var totalQ = localStorage.getItem("totalQ");
            var totalQAll = localStorage.getItem("totalQAll");
            var scoreAll = localStorage.getItem("scoreAll");
            totalQAll++;
            totalQ++;
            o1.disabled = true;
            o2.disabled = true;
            o3.disabled = true;
            o4.disabled = true;
            if(o4check.innerHTML=="true"){
                o4.style.backgroundColor = "#9aeabc" //green;
                score++;
                scoreAll++;
            }else{
                o4.style.backgroundColor = "#ff9393" //red;
                if(o1check.innerHTML=="true"){
                    o1.style.backgroundColor = "#9aeabc" //green;
                }
                else if(o2check.innerHTML=="true"){
                    o2.style.backgroundColor = "#9aeabc" //green;
                }
                else if(o3check.innerHTML=="true"){
                    o3.style.backgroundColor = "#9aeabc" //green;
                }
            }
            nextBtn.style.display = "Block";
            localStorage.setItem("totalQ", totalQ);
            localStorage.setItem("score", score);
            localStorage.setItem("scoreAll",scoreAll);
            localStorage.setItem("totalQAll",totalQAll);
        }

        function updateScore(){
            var score = localStorage.getItem("score");
            var totalQ = localStorage.getItem("totalQ");
            const quizScore = document.getElementById("quiz-score");
            if(score === "null"){
                score = 0 ;
            };
            quizScore.innerHTML = `${score} out of ${totalQ}`;
        }
        //console.log(score);
        
        


        const aqa_score = document.querySelector("#percentage");
        const accuracy= Math.round(score/totalQ);
        aqa_score.innerHTML = "Hello";

        function statUpdate(){
            var score = localStorage.getItem("scoreAll");
            var totalQ = localStorage.getItem("totalQAll");
            const aqa_score = document.querySelector("#percentage");
            const accuracy= Math.round((score/totalQ)*100);
            aqa_score.innerText = `${accuracy}%`;
            console.log(accuracy);
            $.ajax({
                type:'POST',
                url:'updatedata.php',
                data:{accuracy:accuracy},
                success:function(response){
                    console.log(response);
                }
            })

            let offset = 472-(accuracy/100*472);

            document.documentElement.style.setProperty('--dashoffset', offset);

            const dashboardScore =document.querySelector(".average-score");
            dashboardScore.innerText = `${accuracy}%`;


            
        }
        const statUpdateDashboard = () =>{
            statUpdate();
        }




        function profilePopup() {
            let blur = document.querySelector(".main-page-dashboard");
            let popup = document.querySelector(".profile");
            let popupClose = document.querySelector(".close-button");
            popup.classList.add("open-popup");
            blur.classList.add("blur");
            
        }
        function closePopup(){
            let blur = document.querySelector(".main-page-dashboard");
            let popup = document.querySelector(".profile");
            popup.classList.remove("open-popup");
            blur.classList.remove("blur");
        }



        

        