<template>
    <div class="comment w-full md:w-[730px] md:max-w-full flex justify-end items-center">

        <div
            class="h-auto min-w-full md:min-w-full bg-white rounded-[8px] flex flex-col md:flex-row md:justify-center items-center md:items-start md:gap-[16px] md:px-[24px] overflow-hidden">

            <div class="w-[40px] h-[40px] justify-center items-start pt-[24px] hidden md:flex">
                <img class="w-[40px] h-[40px]" src="../../../public/images/avatars/image-juliusomo.webp" alt="">
            </div>

            <div
                class="w-full px-[16px] md:w-auto md:px-0 justify-center pt-[24px] md:py-[24px] flex flex-col h-[80%] md:h-full flex-grow">

                <textarea style="border-width: 1px; resize: none; height: auto;"
                    class="w-full min-h-[96px] h-auto rounded-[8px] border-moderate-blue outline-0 pt-[12px] px-[24px] flex-grow"
                    name="" id=""></textarea>

                   
            </div>

            <div class="h-[20%] md:flex hidden justify-between items-center pt-5">
                <button
                    class="w-[104px] h-[48px] rounded-[8px] bg-moderate-blue text-white font-rubik font-medium">SEND</button>
            </div>




            <div class="w-full h-[20%] flex md:hidden justify-between items-center p-5">
                <img class="w-[40px] h-[40px]" src="../../../public/images/avatars/image-juliusomo.webp" alt="">


                <div class="items-center gap-2 flex">

                    <!-- <p class="font-rubik text-moderate-blue font-medium">Reply</p> -->
                    <button class="w-[104px] h-[48px] rounded-[8px] bg-moderate-blue text-white font-rubik font-medium">
                        SEND
                    </button>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Replying',
};
</script>