<script setup></script>

<style scoped>
#up {
    background: url('https://www.energy.fit/cdn/shop/articles/cardio.jpg?v=1639065893&width=2048');
    background-size: cover;
    background-repeat: no-repeat;
}
</style>

<template>
    <div id="up">
        <!-- Overlay Background + Center Control -->
        <div class="h-screen bg-opacity-50 bg-black flex items-center justify-center"
            style="background: rgba(0, 0, 0, 0.5)">
            <div class="mx-2 text-center">
                <h1 class="text-white font-bold text-4xl xs:text-5xl md:text-6xl"><span>Get In
                        Shape With Our Service!</span></h1>
                <div class="inline-flex">
                    <button
                        class="py-3 px-4  my-5 mx-2 bg-orange-500 border-orange-500 hover:bg-white hover:border-white hover:text-orange-500 hover:font-bold font-semibold text-white rounded-md border-[3px] shadow-md transition duration-500 md:text-xl">Get
                        Started!</button>
                    <a href="#about"><button
                            class="py-3 px-4 my-5 mx-2 bg-transparent border-[3px] hover:bg-orange-500 border-orange-500 rounded-md font-bold text-white shadow-md transition duration-500 md:text-lg">
                            Learn More ->
                        </button></a>
                </div>
            </div>
        </div>
    </div>
</template>
