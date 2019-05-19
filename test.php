$db->query("
INSERT INTO basket_ticket(user_id, ticket_id)
VALUES($user_id, $ticket_id)
");



header("Location: result.php?p=ticket&d_country=$d_country&d_city=$d_city&a_country=$a_country&a_city=$a_city&d_day=$d_day&d_month=$d_month&d_year=$d_year&a_day=$a_day&a_month=$a_month&a_year=$a_year&t_budget=$t_budget&housing1=$housing1&housing2=$housing2&h_budget=$h_budget&entertainment1=$entertainment1&entertainment2=$entertainment2&entertainment3=$entertainment3&entertainment4=$entertainment4&entertainment5=$entertainment5&entertainment6=$entertainment6&entertainment7=$entertainment7&entertainment8=$entertainment8&e_budget=$e_budget&guide_yes=$guide_yes&guide_no=$guide_no&g_budget=$g_budget");
