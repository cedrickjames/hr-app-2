<?php
include ("../includes/connect.php");

if (isset($_GET['employeeId'])) {
  $employeeId = $_GET['employeeId'];
//   error_log("Department received: " . $department);
  // Assuming you have a database connection established
  $sql = "SELECT
  si.empNo AS employeeId,
  (COALESCE(MAX(CASE WHEN h.field = 'monthlySalary' THEN h.hr_from END), si.monthlySalary)+
   COALESCE(MAX(CASE WHEN h.field = 'pAllowance' THEN h.hr_from END), si.pAllowance)+
   COALESCE(MAX(CASE WHEN h.field = 'tsAllowance' THEN h.hr_from END), si.tsAllowance)+
   COALESCE(MAX(CASE WHEN h.field = 'leLicenseFee' THEN h.hr_from END), si.leLicenseFee)+
   COALESCE(MAX(CASE WHEN h.field = 'leAllowance' THEN h.hr_from END), si.leAllowance)+
   COALESCE(MAX(CASE WHEN h.field = 'ceCertificateOnFee' THEN h.hr_from END), si.ceCertificateOnFee)+
   COALESCE(MAX(CASE WHEN h.field = 'ceAllowance' THEN h.hr_from END), si.ceAllowance)) AS total_sum,
   (si.monthlySalary + si.pAllowance + si.tsAllowance + si.leLicenseFee + si.leAllowance + si.ceCertificateOnFee+si.ceAllowance) as total_sum_now
FROM
  salaryincrease si
LEFT JOIN (
  SELECT
    h1.employeeId,
    h1.field,
    h1.hr_from
  FROM
    history h1
    JOIN (
      SELECT
        employeeId,
        MAX(dateOfEffectivity) AS maxDate
      FROM
        history
      GROUP BY
        employeeId
    ) subquery ON h1.employeeId = subquery.employeeId AND h1.dateOfEffectivity = subquery.maxDate
  WHERE
    (h1.employeeId, h1.dateOfEffectivity, h1.field, h1.id) IN (
      SELECT
        employeeId,
        dateOfEffectivity,
        field,
        MAX(id)
      FROM
        history
      WHERE
        (employeeId, dateOfEffectivity, field) IN (
          SELECT
            employeeId,
            dateOfEffectivity,
            field
          FROM
            history
          GROUP BY
            employeeId,
            dateOfEffectivity,
            field
          HAVING
            MAX(id) = MAX(CASE WHEN dateOfEffectivity = subquery.maxDate THEN id END)
        )
      GROUP BY
        employeeId,
        dateOfEffectivity,
        field
    )
) h ON si.empNo = h.employeeId WHERE si.empNo = '$employeeId'
GROUP BY
  si.empNo
ORDER BY
  si.employeeName;
  ";
  $result = mysqli_query($con, $sql);

  while ($row = mysqli_fetch_assoc($result)) {
    $data = $row;
  }

  echo json_encode($data);
} else {
  echo json_encode(array()); // Return an empty array if no department provided
}
?>