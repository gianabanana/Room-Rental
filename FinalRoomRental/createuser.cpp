#include "createuser.h"
#include "ui_createuser.h"
#include "rents.h"

CreateUser::CreateUser(QWidget *parent) :
    QWidget(parent),
    ui(new Ui::CreateUser)
{
    ui->setupUi(this);
    QPixmap pix("C:/Users/GianFrancesSacay/Desktop/RoomRental/RoomRental/images/bbb");
    ui->label_3->setPixmap(pix);
    ui->tableView->hide();
    ui->tableView_2->hide();
    loadDatabase();
}

void CreateUser::loadDatabase()
{
    QSqlTableModel *model=new QSqlTableModel();
    model->setTable("addboarder");
    model->select();
    ui->tableView->setModel(model);
    ui->groupBox->setDisabled(true);
}

void CreateUser::delay(int seconds)
{
    QTime delayTime=QTime::currentTime().addSecs(seconds);
    while(QTime::currentTime()<delayTime){
        QCoreApplication::processEvents(QEventLoop::AllEvents, 1);
    }
}

CreateUser::~CreateUser()
{

    delete ui;
}

void CreateUser::on_pushButtonOK_clicked()
{
    QSqlTableModel *model=new QSqlTableModel(this);
    QSqlQuery query;
    model->setTable("addboarder");
    firstName=ui->lineEditFirstName->text();
    qDebug()<<firstName;
    qDebug()<<lastName;
    lastName=ui->lineEditLastName->text();
    QString begin="FirstName='";
    QString end="'";
    begin.append(firstName);
    begin.append(end);
    model->setFilter(begin);
    model->select();
    qDebug()<< query.lastError();
    ui->tableView->setModel(model);

    QString iD=ui->tableView->model()->data(ui->tableView->model()->index(0, 0)).toString();
    eID=iD.toInt();
    storedFirstName=ui->tableView->model()->data(ui->tableView->model()->index(0, 4)).toString();
       if(firstName==storedFirstName){
           qDebug()<<"Username found!";
           qDebug()<<eID;
           storedLastName=ui->tableView->model()->data(ui->tableView->model()->index(0, 7)).toString();
           if(lastName==storedLastName){
               ui->comment->setText("User found!");
               ui->groupBox->setEnabled(true);
           }
       } else{
           ui->comment->setText("Account not found!");
       }
}

void CreateUser::on_lineEditUsername_textChanged(const QString &arg1)
{
    Username=arg1;
    qDebug()<<Username;
}

void CreateUser::on_lineEditPassword_textChanged(const QString &arg1)
{
    Password=arg1;
    qDebug()<<Password;
}

void CreateUser::on_pushButtonCreate_clicked()
{
    QSqlTableModel *model2=new QSqlTableModel();
    model2->setTable("addboarder");
    model2->select();
    qDebug()<<model2->lastError();
    ui->tableView_2->setModel(model2);

    QSqlQuery query;
    query.prepare("SELECT *FROM addboarder WHERE Username=:Username and Password=:Password");
    query.bindValue(":Username", Username);
    query.bindValue(":Password", Password);
    query.exec();
    int count=0;
    while(query.next()){
        count++;
    }
    if(count==1){
        ui->comment_2->setText("Username already taken!");
    }
    if(count<1){
        QSqlQuery query;
        query.prepare("UPDATE `database`.addboarder set Username='"+Username+"', Password='"+Password+"'"
                      "WHERE eID=:eID");
        query.bindValue(":eID", eID);
        query.bindValue(":Username", Username);
        query.bindValue(":Password", Password);
        delay(1);
        qDebug()<<eID;
        query.exec();
        qDebug()<<query.lastError();

        PopUpCreateAccount *create=new PopUpCreateAccount;
        this->hide();
        create->show();
    }
}
