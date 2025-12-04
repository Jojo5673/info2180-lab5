window.onload = () => {
	const city = document.getElementById("lookup-cities");
	const country = document.getElementById("lookup-country");
	const input = document.getElementById("country");
	const results = document.getElementById("result");

	const submit = async function(type) {
		let query = input.value.trim();
		const res = await fetch(`world.php?country=${query}&lookup=${type}`);
		const text = await res.text();
		results.innerHTML = text;
	};

	city.onclick = async () => await submit("cities")
    country.onclick = async () => await submit("country")
};
