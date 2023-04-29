const subcategories = {
    academics: ['Textbook', 'Testprep', 'Book', 'Folder', 'Pens & Pencils', 'Binders', 'Note Cards'],
    health: ['Home Workout Equipment', 'Fitness Clothes', 'Weightlifting Belts', 'Foam Rollers', 'Sport Equipment', 'Yoga Matts', 'Waterbottles', 'Bodyweight Scales', 'Massage Guns'],
    room: ['Plants', 'Lights', 'Rugs', 'Art', 'Plates & Bowls', 'Utensils', 'Water Heaters', 'Coffee Machines', 'Pots & Pans'],
    fashion: ['Mens Clothing', 'Mens Sports Fan Shop', 'Mens Footwear', 'Womens Clothing', 'Womens Sports Fan Shop', 'Womens Footwear', 'Handbags & BackPacks', 'Sunglasses', 'Hats', 'Jewelery & Watches'],
    entertainment: ['Computers & Tablets', 'TV & Home Theater', 'Cameras', 'Speakers', 'Smart Watches', 'Headphones', 'Phones', 'Video Games', 'Movies & Music', 'Collectibles']
};

function showSubCategories() {
    const category = document.getElementById('category').value;
    const subcategorySelect = document.getElementById('subcategory');
    subcategorySelect.innerHTML = '';

    if (category) {
        const options = subcategories[category];
        for (let i = 0; i < options.length; i++) {
            const option = document.createElement('option');
            option.value = options[i];
            option.text = options[i];
            subcategorySelect.appendChild(option);
        }
        subcategorySelect.disabled = false;
    } else {
        subcategorySelect.disabled = true;
    }
}

function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('preview-img');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}