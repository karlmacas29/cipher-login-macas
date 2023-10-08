<style>
        /* Light Mode */
        body{
        margin: 0;
        transition: background-color 0.3s;
        }

        
        ::-webkit-scrollbar {
        width: 7px;
        background-color: white;
        }

        

        ::-webkit-scrollbar-thumb {
        background-color: skyblue;
        }
        /* Custom CSS for the sidebar */

        .loader {
        width: 77%;
        height: 100%;
        position: fixed;
        display: flex;
        background-color: white;
        justify-content: center;
        transition: opacity 0.75s, visibility 0.75s;
        margin: 0;
        z-index: 9999;
        }

        .loader-2 {
        width: 100%;
        height: 100%;
        position: fixed;
        display: flex;
        background-color: white;
        justify-content: center;
        transition: opacity 0.75s, visibility 0.75s;
        margin: 0;
        z-index: 9999;
        }

        .ball {
        list-style: none;
        margin:auto 10px;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #6a82fb;
        }

        .ball:nth-child(1) {
        animation: bounce-1 2.1s ease-in-out infinite;
        }

        @keyframes bounce-1 {
        50% {
            transform: translateY(-18px);
            background-color: #fc5c7d;
        }
        }

        .ball:nth-child(2) {
        animation: bounce-3 2.1s ease-in-out 0.3s infinite;
        }

        @keyframes bounce-2 {
        50% {
            transform: translateY(-18px);
            background-color: #fc5c7d;
        }
        }

        .ball:nth-child(3) {
        animation: bounce-3 2.1s ease-in-out 0.6s infinite;
        }

        @keyframes bounce-3 {
        50% {
            transform: translateY(-18px);
            background-color: #fc5c7d;
        }
        }
        .loader--hidden {
        opacity: 0;
        visibility: hidden;
        
    }
    


    </style>