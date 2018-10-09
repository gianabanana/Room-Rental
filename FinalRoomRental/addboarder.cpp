#include "addboarder.h"
#include "ui_addboarder.h"
#include "rents.h"

AddBoarder::AddBoarder(QWidget *parent) :
    QWidget(parent),
    ui(new Ui::AddBoarder)
{
    ui->setupUi(this);
    QPixmap pix("C:/Users/GianFrancesSacay/Desktop/RoomRental/RoomRental/images/bbb");
    ui->label_2->setPixmap(pix);
    loadDatabase();
    ui->lineEdit->hide();
    ui->tableView->hide();
    dateEdit=new QDateEdit();
    QDate date=QDate::currentDate();
    ui->dateEdit->setDate(date);
    ui->dateEdit->setDisplayFormat("dd MMMM, yyyy");
}

AddBoarder::~AddBoarder()
{
    delete ui;
}

void AddBoarder::loadDatabase()
{
    QSqlTableModel *model=new QSqlTableModel();
    model->setTable("addboarder");
    model->select();
    qDebug()<<model->lastError();
    ui->tableView->setModel(model);
}

//void AddBoarder::on_lineEditeID_textChanged(const QString &arg1)
//{
//    QString id=arg1;
//    eID=id.toInt();
//    qDebug()<<eID;
//}

void AddBoarder::on_dateEdit_dateChanged(const QDate &date)
{
//    QSqlQuery query;
//    eID=ui->tableView->model()->data(ui->tableView->model()->index(0, 0)).toInt();
//    DateEntered=ui->tableView->model()->data(ui->tableView->model()->index(0, 1)).toString();
//    qDebug()<<DateEntered;

//    QString dateEntered=DateEntered;
//    QString rDate=dateEntered.left(2);
//    int numberDate=rDate.toInt();
//    qDebug()<<dateEntered;
//    qDebug()<<rDate;
//    qDebug()<<numberDate;

    DateEntered=date.toString("dd MMMM, yyyy");
    ui->lineEdit->setText(DateEntered);
}

void AddBoarder::on_comboBox_currentTextChanged(const QString &arg1)
{
    QString room;
    room=arg1;
    RoomNumber=room.toInt();
    qDebug()<<RoomNumber;
}

void AddBoarder::on_lineEditFirstName_textChanged(const QString &arg1)
{
    FirstName=arg1;
}

void AddBoarder::on_lineEditSecondName_textChanged(const QString &arg1)
{
    SecondName=arg1;
}

void AddBoarder::on_lineEditMiddleName_textChanged(const QString &arg1)
{
    MiddleName=arg1;
}

void AddBoarder::on_lineEditLastName_textChanged(const QString &arg1)
{
    LastName=arg1;
}

void AddBoarder::on_lineEditHomeAddress_textChanged(const QString &arg1)
{
    HomeAddress=arg1;
}

void AddBoarder::on_lineEditSchool_textChanged(const QString &arg1)
{
    School=arg1;
}

void AddBoarder::on_lineEditCourse_textChanged(const QString &arg1)
{
    Course=arg1;
}

void AddBoarder::on_lineEditBalance_textChanged(const QString &arg1)
{
    QString bal=arg1;
    Balance=bal.toInt();
}

void AddBoarder::on_pushButtonAddBoarder_clicked()
{
    if(ui->radioButton->isChecked()==true){
        Gender="Male";
    } else if(ui->radioButton_2->isChecked()==true){
        Gender="Female";
    }

    QSqlQuery query;
    query.prepare("INSERT INTO database.addboarder(eID, DateEntered, RoomNumber, Gender, FirstName, SecondName, MiddleName, LastName, HomeAddress, School, Course, Balance, Username, Password)"
                  "VALUES(:eID, :DateEntered, :RoomNumber, :Gender, :FirstName, :SecondName, :MiddleName, :LastName, :HomeAddress, :School, :Course, :Balance, :Username, :Password)");
    query.bindValue(":eID", eID);
    query.bindValue(":DateEntered", DateEntered);
    query.bindValue(":RoomNumber", RoomNumber);
    query.bindValue(":Gender", Gender);
    qDebug()<<Gender;
    query.bindValue(":FirstName", FirstName);
    query.bindValue(":SecondName", SecondName);
    query.bindValue(":MiddleName", MiddleName);
    query.bindValue(":LastName", LastName);
    query.bindValue(":HomeAddress", HomeAddress);
    query.bindValue(":School", School);
    query.bindValue(":Course", Course);
    query.bindValue(":Balance", Balance);
    query.bindValue(":Username", Username);
    query.bindValue(":Password", Password);
    query.exec();
    qDebug()<<query.lastError();

    PopUpAddBoarder *popAdd=new PopUpAddBoarder;
    this->hide();
    popAdd->show();
}

void AddBoarder::on_pushButtonCancel_clicked()
{
    Rents *r=new Rents;
    this->hide();
    r->show();
}
