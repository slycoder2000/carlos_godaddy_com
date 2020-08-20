import axios from 'axios'


<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
			Dances
			<ul v-if="dances.length">
				<li v-for="dance in dances">{{ dance.dance }}</li>
			</ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    axios.defaults.baseURL = 'http://slycoder02/api';

    


export default {
		props: ['data'], // accepts data for replies
        data: function() {
            return {
                services: [
                    'Software Engineering',
                    'Web Development',
                    'Computer Repair and Upgrades',
                    'Video Conversion',
                    'Professional Consulting & Tutoring'
                ],
                dances:[
                    'dance'
                ]
                  
            };
        },
        created() {
        axios.get('getDances')
        .then(response => {
            console.log(response.data)
            this.dances = response.data;
        })
        .catch(error => {
            console.log(error)
        });
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
