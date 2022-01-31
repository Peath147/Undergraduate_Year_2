package CSS2103.HomeWork;

public class StackWithQueue {
    public static void main(String[] args) {
        Stack s = new Stack();
        s.push(1);
        s.push(2);
        s.push(3);

        System.out.println();

        System.out.println("Stack pop : "+ s.pop());
        System.out.println("Stack pop : "+ s.pop());
        System.out.println("Stack pop : "+ s.pop());

    }

    static class Stack { //การทำ stack ด้วย queue เราจะสร้าง queue ขึ้นมา 2 queue โดนเราไว้สำหรับ พักข้อมูล 1 queue
                        //เช่น ถ้าเรานำ 1 2 push ตามลำดับ

        // enqueue 1 จะนำค่า 1 ลงใน queue 2 เลย
        //
        //  queue 1 |
        // ----------------------------
        //  queue 2 | 1
        //
        // enqueue 1 แล้วนำข้อมูลทั้งหมดใน queue 2 กลับมา queue 1
        //
        //  queue 1 | 1
        // ----------------------------
        //  queue 2 |
        //
        // enqueue 2 จะนำค่าลงใน queue 2
        //
        //  queue 1 | 1
        // ----------------------------
        //  queue 2 | 2
        //
        // enqueue 2 จากนั้นนำค่าทั้งหมดใน queue 1 ไปใส่ใน queue 2
        //
        //  queue 1 |
        // ----------------------------
        //  queue 2 | 2 1
        //
        // enqueue 2 แล้วจะทำการนำข้อมูลทั้งหมดใน queue 2 ใส่ใน queue 1
        //
        //  queue 1 | 2 1
        // ----------------------------
        //  queue 2 |
        //
        // ที่นี้เวลาเรา dequeue เราจะได้เลข 2 ก่อนเหมือน stack LIFO เข้าหลังออกก่อน

        static QueueUsingLinkedList q1 = new QueueUsingLinkedList(); //สร้าง queue ชื่อ q1
        static QueueUsingLinkedList q2 = new QueueUsingLinkedList(); //สร้าง queue ชื่อ q2

        static int curr_size;

        Stack()
        {
            curr_size = 0;
        }

        static void push(Object x)
        {

            q2.enqueue(x); //นำข้ออมูลเข้า queue 2
            System.out.println("Stack push : " + x);

            while (!q1.isEmpty()) { //นำข้อมูลทั้งหมดใน queue 1 ไปใส่ queue2
                q2.enqueue(q1.dequeue());
            }

            while (!q2.isEmpty()) { //นำข้อมูลทั้งหมดใน queue 2 กลับไปใส่ queue 1
                q1.enqueue(q2.dequeue());
            }
        }

        static Object pop()
        {
            if (q1.isEmpty())
                return "";
            Object x = q1.dequeue(); //ทำการ dequeue ใน queue 1 แล้วนำค่าไปเก็บไว้ที่ x
            return x; // return ค่า x กลับไป
        }

        static int size()
        {
            return q1.currentSize;
        }
    }

    static class QueueUsingLinkedList {
        private Node front, rear;
        private int currentSize;

        private class Node {
            Object data;
            Node next;
        }

        public QueueUsingLinkedList() {
            front = null; //ไว้เก็บ linklist แรกสุด
            rear = null; // เก็บ linklist ถัดไป
            currentSize = 0; // ขนาดเริ่มต้นของ queue = 0
        }

        public boolean isEmpty() {
            return (currentSize == 0);
        }

        public void enqueue(Object data) { //นำเข้าข้อมูล
            Node oldRear = rear; //นำ addess ของ linklist ก่อนหน้าใส่ oldrear
            rear = new Node(); //สร้าง linklist
            rear.data = data; //นำข้อมูลใส่ลง linklist
            rear.next = null; //กำหนดค่าถัดไปเป็น null ก็คือlinklist นี้ยังไม่มีค่าถัดไป
            //      -------------       ------------
            if (isEmpty()) { //ถ้า Queue ว่างให้นำ linklist นี้ไปใส่ไว้ในค่า front คือค่า linklist ตัวแรกสุด
                front = rear;
            } else {
                oldRear.next = rear; // ถ้า queue มีข้อมูลอยู่แล้วให้นำ addess linklist
            }                       // นี้ไปใส่ไว้ใน next ของ linklist ก่อนหน้าให้รู้ว่า linklist นี้มาหลัง linklist ก่อนหน้่า
            //
            currentSize++; //เพิ่ม size
        }

        public Object dequeue() { //นำข้อมูลออก
            Object data = front.data; //นำค่าใน linklist แรกสุดไปเก็บไว้ใน data
            front = front.next; // นำ addess ของ linklist ถัดไปมาแทนที่ linklist แรก
            if (isEmpty()) {   // แต่ถ้าไม่มี linklist แล้วให้ใส่เป็นค่า null
                rear = null;
            }
            currentSize--; //ลดขนาด size ของ queue
            return data;
        }
    }

}
