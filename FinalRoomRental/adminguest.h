#ifndef ADMINGUEST_H
#define ADMINGUEST_H

#include <QWidget>

namespace Ui {
class AdminGuest;
}

class AdminGuest : public QWidget
{
    Q_OBJECT

public:
    explicit AdminGuest(QWidget *parent = 0);
    ~AdminGuest();

private slots:
    void on_admin_clicked();

    void on_boarder_clicked();

    void on_exit_clicked();

private:
    Ui::AdminGuest *ui;
};

#endif // ADMINGUEST_H
