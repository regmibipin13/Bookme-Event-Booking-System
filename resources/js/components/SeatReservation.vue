<template>
	
</template>

<script type="text/javascript">
	
	export default {
		props:['seats','event'],
		data: function() {
			return {
				selected:[],
				selectedNames:[],
			};
		},
		methods:{
			selectSeat(seat) {
				if(this.selectedNames.includes(seat.name)) {
					var index = this.selected.indexOf(seat);
					this.selected.splice(index, 1);
				} else {
					this.selected.push(seat);
				}
			},
			onSubmit() {
				axios.post('/api/reserve-seats/'+this.event.id,{
					seats:this.selected,
				}).then((response) => {
					console.log(response.data);
					Vue.$toast.success('Seats reserved successfully');
					window.location.href = '/success';
				}).catch((error) => {
					console.log(error);
				})
			},
			reset() {
				this.selected = [];
			}
		},
		watch:{
			selected(array) {
				var _this = this;
				_this.selectedNames = [];
				this.selected.forEach(function(obj){
					_this.selectedNames.push(obj.name);
				});
			}
		}


	}

</script>