var monthlySalary = document.getElementById("monthlySalary").value;
var posAllowance = document.getElementById("posAllowance").value;
var tsAllowance = document.getElementById("tsAllowance").value;
var leLicenseFee = document.getElementById("leLicenseFee").value;
var leAllowance = document.getElementById("leAllowance").value;
var ceCertificateOnFee = document.getElementById("ceCertificateOnFee").value;
var ceAllowance = document.getElementById("ceAllowance").value;

var employeeId = document.getElementById("employeeId").value;
var overallNow;
var overallBefore;



// var birthday = new Date(employee.birthday);
            
// var computedAge = (date.getTime() - birthday.getTime()) / (1000 * 60 * 60 * 24 * 365);
// var computedAgeDecimal = computedAge.toFixed(0);
// setage(computedAgeDecimal)


console.log(monthlySalary, posAllowance, tsAllowance, leLicenseFee, leAllowance, ceCertificateOnFee, ceAllowance)
const num1bs = parseFloat(monthlySalary);
const num2pa = parseFloat(posAllowance);
const num3ts = parseFloat(tsAllowance);
const num4ll = parseFloat(leLicenseFee);
const num5la= parseFloat(leAllowance);
const num6cc = parseFloat(ceCertificateOnFee);
const num7ca = parseFloat(ceAllowance);


const totaloverall = isNaN(num1bs) ? 0 : num1bs + (isNaN(num2pa) ? 0 : num2pa) + (isNaN(num3ts) ? 0 : num3ts)+ (isNaN(num4ll) ? 0 : num4ll)+ (isNaN(num5la) ? 0 : num5la)+ (isNaN(num6cc) ? 0 : num6cc)+ (isNaN(num7ca) ? 0 : num7ca);
document.getElementById("totalOverall").value = totaloverall;

console.log("Overall Total: " + totaloverall)

var xhr = new XMLHttpRequest();
xhr.open('GET', 'getBeforeData.php?employeeId=' + employeeId, true);
xhr.onreadystatechange = function() {
  if (xhr.readyState === 4 && xhr.status === 200) {
    var data = JSON.parse(xhr.responseText);
console.log(data.total_sum);

overallBefore = data.total_sum;
overallNow = data.total_sum_now;
const difference = isNaN(overallNow) ? 0 : overallNow - (isNaN(overallBefore) ? 0 : overallBefore);
document.getElementById("upValue").value = difference;

var UPLOAD = document.getElementById("upLoad");

// Add a class to the element
UPLOAD.classList.add("hidden");



const percentages = ((isNaN(difference) ? 0 : difference / (isNaN(overallBefore)? 0 : overallBefore))*100).toFixed(2);
// setPercentage(percentages+"%")
document.getElementById("percentage").value = percentages+"%";

var PERCENTLOAD = document.getElementById("percentLoad");

// Add a class to the element
PERCENTLOAD.classList.add("hidden");

  }
};
xhr.send();


// setOverAllTotal(totaloverall);


// setUp(difference)

