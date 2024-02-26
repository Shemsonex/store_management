
// Retrieve the error message from the URL parameter
const urlParams = new URLSearchParams(window.location.search);
const errorMessage = urlParams.get('error');
const successMessage = urlParams.get('success');

// Get the message containers on the page
const errorContainer = document.getElementById('error-container');
const successContainer = document.getElementById('success-container');


// Display the messages on the page
errorContainer.textContent = errorMessage;
successContainer.textContent = successMessage;

if(urlParams.get('error') == null){ errorContainer.style.display = 'none'; }
    else{  errorContainer.style.display = 'block'; setTimeout(() => { errorContainer.style.display = 'none'; }, 3500); }

if(urlParams.get('success') == null){  successContainer.style.display = 'none'; }
    else{  successContainer.style.display = 'block'; setTimeout(() => { successContainer.style.display = 'none'; }, 3500); }

    // const select_animal = document.getElementById('animal');
    // const microchip_number = document.getElementById('sho');
    // const insurance_delivery_date = document.getElementById('insurance_delivery_date').value;
    // const price = document.getElementById('price').value;
    // const contract_number = document.getElementById('contract_number').value;
    // const mode_of_payment = document.getElementById('mode_of_payment');
    // const momo_number = document.getElementById('momo_number').value;
    // const airtelMoney_number = document.getElementById('airtelMoney_number').value;
    // const company_name = document.getElementById('company_name').value;
    // const account_number = document.getElementById('account_number').value;
    // const option = document.createElement('option');
    // function edit(cat_id,microchip_number,insurance_delivery_date,price,contract_number,mode_of_payment){
    //   // console.log(cat_id,microchip_number,mode_of_payment,insurance_delivery_date,price,contract_number);
    //   let type;    
    //      if(cat_id==1){ 
    //        type = 'Chicken'; }else if(cat_id==2) { 
    //        type = 'Cow'; }else if(cat_id==3) { 
    //        type = 'Duck'; }else if(cat_id==4) { 
    //        type = 'Goat'; }else if(cat_id==5) { 
    //        type = 'Pig'; }else{ 
    //        type = 'Sheep'; 
    //     }        
    //     // option.value = cat_id;
    //     // option.textContent = type;
    //     // option.selected =true;
    //     // select_animal.prepend(option);
    //     microchip_number.innerText=microchip_number;
    //     insurance_delivery_date=insurance_delivery_date;
    //     price=price;
    //     contract_number=contract_number;
    //     mode_of_payment=mode_of_payment;        
    // }    

    // function getDistricts(district_id){
//     fetch('./php/getDistricts.php?district_id=' + district_id)
//         .then(response => response.json())
//         .then(data => {
//             const selectElement = document.getElementById('districts');
//             data.forEach(district => {
//             const option = document.createElement('option');
//             option.value = district.district_id;
//             option.textContent = district.district;
//             selectElement.appendChild(option);
//         });
//         })
//         .catch(error => {
//             console.error('Error:', error);
//         });
// }
function getDistricts(district_id){
    fetch('./php/getDistricts.php?district_id=' + district_id)
        .then(response => response.json())
        .then(data => {
            const selectElement = document.getElementById('districts');
            data.forEach(district => {
            const option = document.createElement('option');
            option.value = district.district_id;
            option.textContent = district.district;
            selectElement.appendChild(option);
        });
        })
        .catch(error => {
            console.error('Error:', error);
        });
}


function getSectors(district_id){
    fetch('./php/getSectors.php?district_id=' + district_id)
        .then(response => response.json())
        .then(data => {
            const selectElement = document.getElementById('sectors');            

            while (selectElement.firstChild) {
              selectElement.removeChild(selectElement.firstChild);
            }
            data.forEach(sector => {
            const option = document.createElement('option');
            option.value = sector.sector_id;
            option.textContent = sector.sector;
            selectElement.appendChild(option);
        });
        })
        .catch(error => {
            console.error('Error:', error);
        });
}


function getCells(sector_id){
    fetch('./php/getCells.php?sector_id=' + sector_id)
        .then(response => response.json())
        .then(data => {
            const selectElement = document.getElementById('cells');
            while (selectElement.firstChild) {
                selectElement.removeChild(selectElement.firstChild);
              }
            data.forEach(cell => {
            const option = document.createElement('option');
            option.value = cell.cell_id;
            option.textContent = cell.cell;
            selectElement.appendChild(option);
        });
        })
        .catch(error => {
            console.error('Error:', error);
        });
}


function getVillages(cell_id){
    fetch('./php/getVillages.php?cell_id=' + cell_id)
        .then(response => response.json())
        .then(data => {
            const selectElement = document.getElementById('villages');
            while (selectElement.firstChild) {
                selectElement.removeChild(selectElement.firstChild);
              }
            data.forEach(village => {
            const option = document.createElement('option');
            option.value = village.village_id;
            option.textContent = village.village;
            selectElement.appendChild(option);
        });
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

function getAddress (village_id){
    let village = document.getElementById('holder');
    fetch('./php/get_one_Village.php?village_id=' + village_id)
    .then(response => response.json())
    .then(data => {
        const selectElement = document.getElementById('villages');        
        while (selectElement.firstChild) {
            selectElement.removeChild(selectElement.firstChild);
        }        
        village.innerHTML = `<input type="hidden" id="one_village" name="village_id" value="` + data[0]['village_id'] + `"/>`;
        data.forEach(village => {
        const option = document.createElement('option');
        option.value = village.village_id;
        option.textContent = village.village;
        selectElement.appendChild(option);
    });
    })
    .catch(error => {        
        console.error('Error:', error);
    });
}

function getInterface (mode){
    // let cash = document.getElementById('cash');
    let momo = document.getElementById('momo');
    let airtel = document.getElementById('airtel');
    let bank = document.getElementById('bank');
    
    if(mode==='1'){
        // cash.style.display = 'block';
        momo.style.display = 'none';
        airtel.style.display = 'none';
        bank.style.display = 'none';
    }
    
    if(mode==='2'){
        momo.style.display = 'block';
        airtel.style.display = 'none';
        bank.style.display = 'none';
    }
    
    if(mode==='3'){
        momo.style.display = 'none';
        airtel.style.display = 'block';
        bank.style.display = 'none';
    }
    
    if(mode==='4'){
        momo.style.display = 'none';
        airtel.style.display = 'none';
        bank.style.display = 'block';
    }
}

function getInterface2 (mode){
    // let cash = document.getElementById('cash');
    let momo = document.getElementById('momo2');
    let airtel = document.getElementById('airtel2');
    let bank = document.getElementById('bank2');
    
    if(mode==='1'){
        // cash.style.display = 'block';
        momo.style.display = 'none';
        airtel.style.display = 'none';
        bank.style.display = 'none';
    }
    
    if(mode==='2'){
        momo.style.display = 'block';
        airtel.style.display = 'none';
        bank.style.display = 'none';
    }
    
    if(mode==='3'){
        momo.style.display = 'none';
        airtel.style.display = 'block';
        bank.style.display = 'none';
    }
    
    if(mode==='4'){
        momo.style.display = 'none';
        airtel.style.display = 'none';
        bank.style.display = 'block';
    }
}

function chart(){
    // Create the chart configuration object
    const chartOptions = {
      chart: {
        type: 'bar',
        height: 350,
      },
      series: [
        {
          name: 'Values',
          data: [1,2,3],
        },
      ],
      xaxis: {
        categories: ['a','b','c'],
      },
    };    
    const chart = new ApexCharts(document.querySelector('#chartBa'), chartOptions);
    chart.render();


    var options = {
        chart: {
          type: 'line'
        },
        series: [{
          name: 'Sales',
          data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
        }],
        xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
        }
      };
    var chartline = new ApexCharts(document.querySelector("#chartLi"), options);
    chartline.render();


    var optionsar = {
        chart: {
          type: 'area'
        },
        series: [{
          name: 'Sales',
          data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
        }],
        xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
        }
      };      
      var chartar = new ApexCharts(document.querySelector("#chartAr"), optionsar);
      chartar.render();
      

      var optionshB = {
        chart: {
          type: 'horizontalBar'
        },
        series: [{
          name: 'Sales',
          data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
        }],
        xaxis: {
          categories: ['Category 1', 'Category 2', 'Category 3', 'Category 4', 'Category 5']
        }
      };
      
      var charthB = new ApexCharts(document.querySelector("#charthB"), optionshB);
      charthB.render();

/////
fetch('./php/getAll.php')
  .then(response => response.json())
  .then(data => {
    console.log(data.chicken[0]['cnt']);
    // const mappedData = Object.keys(data).map(key => {
    //   return {
    //     type: key,
    //     values: data[key]
    //   };
    // });
    
    // console.log(mappedData);
    // Extract required data from the response
    // const categories = data.map(item => item.account_company);
    // const values = data.map(item => item.amount);
      var optionspi = {
        chart: {
          type: 'pie'
        },
        series: [data.cow[0]['cnt'], data.pig[0]['cnt'], data.chicken[0]['cnt']],
        labels: ['Cement', 'Nails', 'Hammer']
      };      
      var chartpi = new ApexCharts(document.querySelector("#chartPi"), optionspi);
      chartpi.render();
      
        })
        .catch(error => {
          console.error('Error:', error);
        });
/////      

}