package CSS2103.HomeWork;

import java.util.Scanner;

public class LinklistSort {

    class Node {
        private int data;
        private Node next;

        public Node(int item) {
            this.data = item;
            this.next = null;
        }

    }

    public Node front = null;
    public Node rear = null;

    public void addNode(int data) {
        Node node = new Node(data);

        if (front == null) { // ถ้ายังไม่มีค่าแรกให้นำ addess มาใส่ front
            front = node;
            rear = node;
        } else { //ถ้ามีแล้วให่นำใส่ rear.next
            rear.next = node;
            rear = node;
        }
    }

    public void sortAscending() {
        Node current = front; //นำค่าแรกมาใส่ current
        Node index = null;
        int temp; // ไว้เก็บค่าเลขตอนสลับที่

        if (front == null){ //ถ้าไม่มีค่าใน linkedlist ให้ return
            return; 
        }else{
            while (current != null){ //วนลูปจนกว่าจะหมดค่า linkedlist
                index = current.next; //เอาค่าถัดจากค่า current มาใส่ใน index ไว้สำหรับเทียบเลข

                while (index != null){ //วนลูปจนกว่าจะหมดค่า linkedlist  (current = ค่าต้น, index = ตัวเทียบ)
                    if (current.data > index.data) { //ถ้าค่าต้นมากกว่าค่าเทียบให้
                        temp = current.data;        //นำค่าต้นมาเก็บไว้ใน temp แล้ว
                        current.data = index.data; //นำค่าที่ไว้เทียบมาเก็บแทนค่าต้น
                        index.data = temp;        //และนำค่าtempมาแทนที่ตัวเทียบ
                    }
                    index = index.next; //นำค่าเทียบตัวถัดไปมาแทนที่ตัวเก่า
                }
                current = current.next; //นำค่าต้นตัวถัดไปมาแทนที่ตัวเก่า
            }
        }
    }

    public void sortDescending() {
        Node current = front; //นำค่าแรกมาใส่ current
        Node index = null;
        int temp; // ไว้เก็บค่าเลขตอนสลับที่

        if (front == null){ //ถ้าไม่มีค่าใน linkedlist ให้ return
            return;
        }else{
            while (current != null){ //วนลูปจนกว่าจะหมดค่า linkedlist
                index = current.next; //เอาค่าถัดจากค่า current มาใส่ใน index ไว้สำหรับเทียบเลข

                while (index != null){ //วนลูปจนกว่าจะหมดค่า linkedlist  (current = ค่าต้น, index = ตัวเทียบ)
                    if (current.data < index.data) { //ถ้าค่าต้นน้อยกว่าค่าเทียบให้
                        temp = current.data;        //นำค่าต้นมาเก็บไว้ใน temp แล้ว
                        current.data = index.data; //นำค่าที่ไว้เทียบมาเก็บแทนค่าต้น
                        index.data = temp;        //และนำค่าtempมาแทนที่ตัวเทียบ
                    }
                    index = index.next; //นำค่าเทียบตัวถัดไปมาแทนที่ตัวเก่า
                }
                current = current.next; //นำค่าต้นตัวถัดไปมาแทนที่ตัวเก่า
            }
        }
    }

    public void Show(){
        Node current = front; // นำค่าแรกมาใส่ current

        if (front == null){ // ถ้าค่าแรกเป้นค่าว่างให้แสดงค่าว่า list นี้ว่าง
            System.out.println("List is empty");
            return;
        }
        while (current != null){ // ถ้ามีค่าให้นำมาแสดงแล้วนำค่าถัดไปมาแทนที่วนลูปปริ้นไปเรื่อยๆ
            System.out.print(current.data + " ");
            current = current.next;
        }
        System.out.println();
    }

    public static void main(String[] args) {

        LinklistSort sort = new LinklistSort();
        Scanner in = new Scanner(System.in);

        System.out.print("Enter size : ");
        int size = in.nextInt();

        for (int i = 0 ; i < size ; i++){
            sort.addNode(sort.random()); //เพิ่ม linkedlist โดยการ random ค่า (sort.addNode = เพิ่มlinkedlist )(sort.random() = random ค่า)
        }

        System.out.print("Number is : ");
        sort.Show();

        sort.sortAscending();
        System.out.print("Sorted list Ascending  : ");
        sort.Show();

        sort.sortDescending();
        System.out.print("Sorted list Descending : ");
        sort.Show();
    }

    public int random(){
        double x = 0;
        return (int)(x = (int)(Math.random()*100)+1); // random ค่า 1-100
    }
}