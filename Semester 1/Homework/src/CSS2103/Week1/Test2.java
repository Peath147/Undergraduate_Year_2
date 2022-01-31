package CSS2103.Week1;

public class Test2 {
    public static void main(String[] args) {
        int grade=5;
        String school;
        if (grade > 12){
            school = "College";
        } else if (grade >= 9){
            school = "High School";
        } else if (grade >= 6){
            school = "Junior High";
        } else if (grade >= 1){
            school = "Elementary School";
        }
    }
}