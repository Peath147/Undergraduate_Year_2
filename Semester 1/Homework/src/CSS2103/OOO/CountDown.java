package CSS2103.OOO;

import java.util.Scanner;

public class CountDown {
    public static int ans;
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        System.out.print("ระบุค่าตัวตั้ง : ");
        int F = sc.nextInt();
        System.out.print("ระบุค่าตัวตลดจำนวน : ");
        int F2 = sc.nextInt();

        System.out.println("แสดงตัวเลข " + F + " ลดค่าทีละ " + F2);
        doCount(F,F2);
    }
    public static void doCount(int x, int y) {
        System.out.print("ผลลัพธ์ : ");
        for (int i = x; i >= 0 ; i -= y) {
            System.out.print(i+" ");
        }
    }
}
