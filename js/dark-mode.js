            function change()
            {
                if(document.getElementById("mode").value=="Dark-Mode")
                {
                    document.getElementById("mode").value="Light-Mode";
                    document.body.style.backgroundColor = '#1c1c1e';
                    document.body.style.color = '#fefefe';
                }
                else if(document.getElementById("mode").value=="Light-Mode")
                {
                    document.getElementById("mode").value="Dark-Mode";
                    document.body.style.backgroundColor = '#f4f7f9';
                    document.body.style.color = '#000000';
                }
            }
