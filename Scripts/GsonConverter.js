<script>
var​ locations = [];
// The first step is obtain all the latitude and longitude from the HTML
    // The below is a simple jQuery selector

    $(​".coordinates"​).each(​function​ () {
​var​ longitude = $(​".longitude"​, ​this​).text().trim(); ​var​ latitude = $(​".latitude"​, ​this​).text().trim();
​var​ description = $(​".description"​, ​this​).text().trim(); ​// Create a point data structure to hold the values. ​var​ point = {
​"latitude"​: latitude, ​"longitude"​: longitude, ​"description"​: description
};
​// Push them all into an array.
locations.push(point);
});
var​ data = [];
for​ (i = 0; i < locations.length; i++) {
​var​
};
data.push(feature)
}var​ locations = [];
// The first step is obtain all the latitude and longitude from the HTML // The below is a simple jQuery selector $(​".coordinates"​).each(​function​ () {
​var​ longitude = $(​".longitude"​, ​this​).text().trim(); ​var​ latitude = $(​".latitude"​, ​this​).text().trim();
​var​ description = $(​".description"​, ​this​).text().trim(); ​// Create a point data structure to hold the values. ​var​ point = {
​"latitude"​: latitude, ​"longitude"​: longitude, ​"description"​: description
};
​// Push them all into an array.
locations.push(point);
});
var​ data = [];
for​ (i = 0; i < locations.length; i++) {
​var​
};
data.push(feature)
}

</script>;;