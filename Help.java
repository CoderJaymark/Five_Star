import java.io.*;
public class Help {
	public static void main(String[] args) throws IOException {
		BufferedWriter bw = new BufferedWriter(new FileWriter(new File("out.txt")));
		for(int i=390;i<=429;i++) {
			// System.out.println("INSERT INTO `five_star`.`seats` (`seatno`, `ticketno`, `busid`, `seatid`) VALUES ('"+i+"', '"+i+"', '1', '"+i+"');");
			// INSERT INTO `five_star`.`tickets` (`ticketno`, `route_id`, `busid`, `date`, `amount`, `status`, `discount`, `created_at`, `updated_at`) VALUES ('"+i+"', '0', '1', '0000-00-00', '0', 'FREE', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
			bw.write("INSERT INTO `five_star`.`seats` (`seatno`, `ticketno`, `busid`, `seatid`) VALUES ('"+i+"', '"+i+"', '9', '"+i+"');\n");
			// bw.write("INSERT INTO `five_star`.`tickets` (`ticketno`, `route_id`, `busid`, `date`, `amount`, `status`, `discount`, `created_at`, `updated_at`) VALUES ('', '0', '4', '0000-00-00', '0', 'FREE', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');\n");
			bw.flush();
		} 
	}
}