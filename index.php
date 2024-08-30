
<?php
include('includes/header.php');
include('includes/config.php');

 ?>

<?php
// session_start();


?>

<?php


$sql = "SELECT id, job_title, description, vacancy, salary, company_name, company_image FROM jobs";
$result = $conn->query($sql);

$conn->close();
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings</title>

    <style>/* General Form Styling */
.search-jobs-form {
    background-color: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 20px 0;
}

.search-jobs-form .row {
    display: flex;
    flex-wrap: wrap;
    gap: 10px; /* Add some space between elements */
}

.search-jobs-form .form-control-lg,
.search-jobs-form .selectpicker {
    font-size: 1rem;
    height: calc(2.5em + 1rem + 2px);
    padding: 0.5rem 1rem;
    border: 1px solid #ced4da;
    border-radius: 4px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    flex: 1;
}

.search-jobs-form .form-control-lg:focus,
.search-jobs-form .selectpicker:focus {
    border-color: #80bdff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.search-jobs-form .selectpicker {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-color: #ffffff;
    color: #495057;
    padding-right: 1.5rem;
}

.search-jobs-form .btn-search {
    font-size: 1.25rem;
    padding: 0.5rem 1rem;
    background-color: #007bff;
    border-color: #007bff;
    transition: background-color 0.3s ease, border-color 0.3s ease;
    flex: 0 1 auto;
}

.search-jobs-form .btn-search:hover {
    background-color: #0056b3;
    border-color: #004085;
}

.search-jobs-form .icon-search {
    font-size: 1.5rem;
    vertical-align: middle;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .search-jobs-form .row {
        flex-direction: column;
    }

    .search-jobs-form .col-lg-3 {
        margin-bottom: 10px;
    }
}

/* Keywords Styling */
.popular-keywords {
    margin-top: 20px;
}

.popular-keywords h3 {
    font-size: 1.25rem;
    margin-bottom: 10px;
    color: #343a40;
}

.popular-keywords .keywords {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.popular-keywords .keywords li {
    list-style: none;
}

.popular-keywords .keywords li a {
    display: inline-block;
    padding: 5px 10px;
    background-color: #e9ecef;
    border-radius: 4px;
    color: #007bff;
    text-decoration: none;
    font-size: 0.875rem;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.popular-keywords .keywords li a:hover {
    background-color: #007bff;
    color: #ffffff;
}
</style>
    <style>body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.job {
    /* width: 50%; */
    margin: auto;
    background: white;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top: 50px;
}

.job-detail-box {
    display: flex;
    align-items: flex-start;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background: #fff;
}

.image-section {
    flex: 1;
    padding-right: 20px;
}

.company-image {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
}

.details-section {
    flex: 2;
}

.details-section h2 {
    margin: 0 0 10px;
    color: #333;
}

.details-section p {
    margin: 5px 0;
}

.buttons {
    
    margin-top: 20px;
}

.apply-button,
.save-button {
    display: inline-block;

    margin: 10px;
    padding: 10px;
    
    margin-right: 10px;
    padding: 10px 20px;
    background: green;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.save-button {
    background: blue;
    margin: 10px;
    padding: 10px;
}

.apply-button:hover {
    background: darkgreen;
}

.save-button:hover {
    background: darkblue;
}


/*  */
/* -------------------------------------------------------- */
.job-list {
    display: flex;
    flex-wrap: wrap;
}

.job-item {
    border: 1px solid #ccc;
    border-radius: 8px;
    /* padding: 20px; */
    margin: 10px;
    width: 100%;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
}

.job-image img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
}

.job-details {
    margin-top: 15px;
    text-align: center;
}

.job-details h3 {
    margin: 10px 0;
    font-size: 1.2em;
}

.job-details p {
    margin: 5px 0;
}

.details-button {
    display: inline-block;
    padding: 10px 20px;
    margin-top: 10px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.details-button:hover {
    background-color: #0056b3;
}</style>
    
</head>
<body><br><br>
<form method="post" class="search-jobs-form">
<center><div class="row mb-5">
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <input type="text" class="form-control form-control-lg" placeholder="Job title, Company...">
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <select class="selectpicker" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Select Region">
                    <option>Anywhere</option>
                    <option>San Francisco</option>
                    <option>Palo Alto</option>
                    <option>New York</option>
                    <option>Manhattan</option>
                    <option>Ontario</option>
                    <option>Toronto</option>
                    <option>Kansas</option>
                    <option>Mountain View</option>
                  </select>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <select class="selectpicker" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Select Job Type">
                    <option>Part Time</option>
                    <option>Full Time</option>
                  </select>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Search Job</button>
                </div>
              </div></center>
              <div class="row">
                <div class="col-md-12 popular-keywords">
                  <h3>Trending Keywords:</h3>
                  <ul class="keywords list-unstyled m-0 p-0">
                    <li><a href="#" class="">UI Designer</a></li>
                    <li><a href="#" class="">Python</a></li>
                    <li><a href="#" class="">Developer</a></li>
                  </ul>
                </div>
              </div>
            </form>
    <div class="job">
    
        <h1>We Are Hiring</h1>
        <div class="job-list">
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="job-item">
                        <img src="jobs/<?php echo htmlspecialchars($row['company_image']); ?>" alt="Company Image" class="company-image">
                        <div class="job-details">
                            <h2><?php echo htmlspecialchars($row['job_title']); ?></h2>
                            <p><?php echo htmlspecialchars($row['description']); ?></p>
                            <p><strong>Company:</strong> <?php echo htmlspecialchars($row['company_name']); ?></p>
                            <p><strong>Vacancy:</strong> <?php echo htmlspecialchars($row['vacancy']); ?></p>
                            <p><strong>Salary:</strong> <?php echo htmlspecialchars($row['salary']); ?></p>
                            <!-- <a href="details.php?id=<?php echo $row['id']; ?>" class="detail-link">View Details</a> -->
                            <button type="submit" class="apply-button"><a href="details.php?id=<?php echo $row['id']; ?>" class="detail-link">View Details</a></button>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No job listings found.</p>
            <?php endif; ?>
        </div>
    </div><br>
</body>
</html> 



<?php include('includes/footer.html');?>

