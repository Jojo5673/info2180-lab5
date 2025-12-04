window.onload = () => {
    const btn = document.getElementById("lookup");
    const input = document.getElementById("country");
    const results = document.getElementById("result");
    btn.onclick = async () => {
        let query = input.value.trim();
        const res = await fetch(`world.php?country=${query}`);
        const text = await res.text();
        results.innerHTML = text
    }
}