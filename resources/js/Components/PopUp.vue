<template>
    <div class="fixed z-30 top-0 bottom-0 left-0 right-0 bg-opacity-50 bg-black flex items-center justify-center">

        <div class="bg-white p-12 fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <i @click="cancel" class="absolute top-2.5 right-3 text-lg text-purple cursor-pointer fas fa-times"></i>
            <div class="flex justify-between space-x-20 mb-5">
                <div class="flex">
                    <div class="mr-5 p-20 bg-purple"></div>
                    <div class="flex flex-col font-montserrat font-medium text-lg">
                        <h2 class="mb-3 font-bold text-purple text-2xl">Nom de l'entreprise</h2>
                        <a href="#" class="hover:underline">www.nomdedomaine.com</a>
                        <a :href="'tel:0769577799'" class="mb-3">+33 7 69 57 77 99</a>
                        <div class="flex items-center">
                            <a :href="'mailto:mail@example.com'"><i class="mr-5 text-purple text-xl fas fa-envelope"></i></a>
                            <a :href="'tel:0769577799'"><i class="text-purple text-xl transform rotate-90 fas fa-phone"></i></a>
                        </div>
                    </div>
                </div>

                <div class="text-right font-montserrat font-medium text-lg">
                    <p class="mb-3 text-2xl">Ville</p>
                    <p>Code postal</p>
                    <p>Pays</p>
                </div>
            </div>

            <div class="flex space-x-10 font-montserrat font-semibold text-purple">
                <p>Secteur d'activités</p>
                <p>Nbr salariés</p>
                <p>Chiffre d'affaire</p>
            </div>

            <p>Description longue</p>

        </div>

    </div>
</template>

<script>
    export default {
        methods: {
            cancel() {
              this.$emit('cancel')  
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>